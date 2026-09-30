<?php

$routes = require "routes.php";


function routeToController(string $uri, array $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);