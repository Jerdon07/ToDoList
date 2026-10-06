<?php

namespace util;

use Exception;

class Container
{
    // Initialize container
    private $bindings = [];

    /**
     * Add/bind a resolver to the service container
     */
    public function bind(string $key, callable $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * Get/resolve a service from the container
     */
    public function resolve(mixed $key)
    {
        // Check if the key exists in the array
        if (array_key_exists($key, $this->bindings)) {
            $resolver = $this->bindings[$key];

            return call_user_func($resolver);
        } else {
            throw new Exception("No matching binding found for {$key}");
        }
    }
}