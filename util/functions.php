<?php

function dd(mixed $value): NULL 
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs(mixed $uri): bool 
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

function abort(int $code = 404) {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
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