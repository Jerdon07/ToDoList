<?php

namespace util;

use Middleware\Middleware;

class Router {

    /* Store/cache all registered routes */
    private $routes = [];

    /**
     * Add a route
     */
    private function add(string $uri, string $controller, string $method): Router
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    /**
     * Add a route with GET method
     */
    public function get(string $uri,string $controller): Router
    {
        return $this->add($uri, $controller, 'GET');
    }

    /**
     * Add a route with POST method
     */
    public function post(string $uri,string $controller): Router
    {
        return $this->add($uri, $controller, 'POST');
    }

    /**
     * Add a route with PUT method
     */
    public function put(string $uri,string $controller): Router
    {
        return $this->add($uri, $controller, 'PUT');
    }

    /**
     * Add a route with PATCH method
     */
    public function patch(string $uri,string $controller): Router
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    /**
     * Add a route with DELETE method
     */
    public function delete(string $uri,string $controller): Router
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    /**
     * Create a middleware for exclusive route
     */
    public function only(string $key): Router
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route(string $uri, string $method)
    {
        /* Scan all in routes variable */
        foreach ($this->routes as $route) {

            /* If there's matched uri and method, then require */
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                /* Apply the middleware */
                Middleware::resolve($route['middleware']);
                
                return require base_path('controllers/' . $route['controller']);
            }    
        }

        $this->abort(Response::NOT_FOUND);
    }

    /**
     * To abort with a status code
     */
    private function abort(int $code = Response::NOT_FOUND): null
    {
        /* Response status code */
        http_response_code($code);

        view("{$code}.php");

        die();
    }
}