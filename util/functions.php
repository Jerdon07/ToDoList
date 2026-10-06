<?php

use util\Response;

/**
 * Dump the value and terminate the current script
 */
function dd(mixed $value): NULL 
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit();
}

/**
 * Check for the current URI
 */
function urlIs(mixed $uri): bool 
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

/**
 * End the script and return view
 */
function abort(int $code = 404) {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

/**
 * Check if the condition is true, else abort
 */
function authorize(bool $condition, int $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

/**
 * Load the base path
 */
function base_path(string $path): string
{
    return BASE_PATH . $path;
}

/**
 * Load vviews path
 */
function view(string $path, array $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

/**
 * Redirect to a route path
 */
function redirect(string $path)
{
    header("location: {$path}");

    exit();
}