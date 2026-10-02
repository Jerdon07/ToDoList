<?php

namespace util;

class Router {

    /* Store/cache all registered routes */
    private $routes = [];

    private function add(string $uri, string $controller, string $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }

    public function get(string $uri,string $controller)
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri,string $controller)
    {
        $this->add($uri, $controller, 'POST');
    }

    public function put(string $uri,string $controller)
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function patch(string $uri,string $controller)
    {
        $this->add($uri, $controller, 'PATCH');
    }

    public function delete(string $uri,string $controller)
    {
        $this->add($uri, $controller, 'DELETE');
    }

    public function route(string $uri, string $method)
    {

        /* Scan all in routes variable */
        foreach ($this->routes as $route) {

            /* If there's matched uri and method, then require */
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort(Response::NOT_FOUND);
    }

    /**
     * To abort with a status code
     */
    private function abort(int $code = Response::NOT_FOUND)
    {
        /* Response status code */
        http_response_code($code);

        view("{$code}.php");

        die();
    }
}