<?php

namespace util;

use Exception;

class Container
{
    private $bindings = [];

    public function bind(string $key, callable $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(mixed $key)
    {
        if (array_key_exists($key, $this->bindings)) {
            $resolver = $this->bindings[$key];

            return call_user_func($resolver);
        } else {
            throw new Exception("No matching binding found for {$key}");
        }
    }
}