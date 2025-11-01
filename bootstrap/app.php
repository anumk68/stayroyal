<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminAuthenticate::class, // ✅ Custom admin middleware
        ]);
    })
    // ->withExceptions(function (Exceptions $exceptions) {
    //     // ✅ Handle 404 Not Found
    //     $exceptions->render(function (NotFoundHttpException $e, Request $request) {
    //         return redirect()->route('home', [], 301);
    //     });


    // })
    ->create();
