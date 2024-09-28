<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        api: __DIR__ . '/../routes/api.php'
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi();
        $middleware->append(HandleCors::class);
        $middleware->appendToGroup('api', [
            EnsureFrontendRequestsAreStateful::class,
            SubstituteBindings::class
        ]);
        $middleware->validateCsrfTokens(except: [
            'webhook/*',  // Example of a route to exclude from CSRF protection
            'api/*'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
