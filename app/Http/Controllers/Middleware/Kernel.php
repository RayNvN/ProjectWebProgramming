protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth:admin' => \App\Http\Middleware\Authenticate::class,
];