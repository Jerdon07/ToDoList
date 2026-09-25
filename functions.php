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

    require "views/{$code}.php";

    die();
}