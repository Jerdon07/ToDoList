<?php

use util\Response;

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

/**
 * Create session
 */
function login(array $user)
{
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'name' => $user['name'],
    ];

    session_regenerate_id(true);
}

/**
 * Destroy session
 */
function logout()
{
    $_SESSION = [];

    session_destroy();

    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}