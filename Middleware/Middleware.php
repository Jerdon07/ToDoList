<?php

namespace Middleware;

use Exception;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve($key)
    {
        if (empty($key)) {
            return;
        }

        $middleware = isset(static::MAP[$key]);

        if (!$middleware) {
            throw new Exception("no matching middleware found for key '{$key}'.");
        }

        (new $middleware)->handle();
    } 
}