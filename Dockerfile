# --- Stage 1: PHP Composer dependencies ---
FROM composer:2.7 AS composer_builder
WORKDIR /app

# Copy only what is needed to download dependencies
COPY composer.json composer.lock ./

# Install dependencies without scripts and autoloader first (for caching)
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction --prefer-dist

# Copy the rest of the application files
COPY . .

# Dump the autoloader and optimize
RUN composer dump-autoload --no-dev --optimize

# --- Stage 2: Node.js frontend assets build ---
FROM node:20-alpine AS node_builder
WORKDIR /app

# Copy dependency configs
COPY package.json package-lock.json ./

# Install packages
RUN npm ci

# Copy application files
COPY . .

# Build assets with Vite
RUN npm run build

# --- Stage 3: Production runtime ---
FROM dunglas/frankenphp:1-php8.2-alpine AS runner

# Set standard environment variables for production
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV SERVER_NAME=:80

# Install required system dependencies and PHP extensions
RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    bash \
    sqlite-dev

# Install PHP extensions using the built-in helper
RUN install-php-extensions \
    pcntl \
    opcache \
    pdo_mysql \
    pdo_sqlite \
    zip \
    gd \
    intl \
    bcmath

# Configure PHP production ini and OPcache
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    { \
        echo "opcache.enable=1"; \
        echo "opcache.enable_cli=1"; \
        echo "opcache.memory_consumption=256"; \
        echo "opcache.max_accelerated_files=20000"; \
        echo "opcache.revalidate_freq=0"; \
        echo "opcache.validate_timestamps=0"; \
        echo "opcache.interned_strings_buffer=16"; \
        echo "opcache.fast_shutdown=1"; \
    } > "$PHP_INI_DIR/conf.d/opcache-production.ini"

WORKDIR /app

# Copy application code
COPY --chown=www-data:www-data . .

# Copy composer vendor dependencies from builder
COPY --from=composer_builder --chown=www-data:www-data /app/vendor ./vendor

# Copy Vite built frontend assets from node builder
COPY --from=node_builder --chown=www-data:www-data /app/public/build ./public/build

# Set permissions for storage and bootstrap cache
RUN chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache

# Copy and set up the entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Expose port 80 (Render overrides this with $PORT)
EXPOSE 80

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile", "--adapter", "caddyfile"]
