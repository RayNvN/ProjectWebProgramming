#!/bin/sh
set -e

# Set SERVER_NAME if PORT is provided by Render/Heroku/Fly.io
if [ -n "$PORT" ]; then
    export SERVER_NAME=":${PORT}"
    echo "Port detected: $PORT. Setting SERVER_NAME to :$PORT"
else
    export SERVER_NAME="${SERVER_NAME:-:80}"
    echo "No PORT env var detected. Using default SERVER_NAME: $SERVER_NAME"
fi

# Run optimization commands in production
if [ "$APP_ENV" = "production" ]; then
    echo "Running production optimizations..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
fi

# Run migrations if RUN_MIGRATIONS=true is set
if [ "$RUN_MIGRATIONS" = "true" ]; then
    echo "Running database migrations..."
    php artisan migrate --force
fi

# Execute the main container command
exec "$@"
