<?php

namespace util;

class App
{
    /* Container initialization */
    private static Container $container;

    /**
     * Set the container
     */
    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    /**
     * Getter function to call the container
     */
    public static function container()
    {
        return static::$container;
    }

    public static function bind(string $key)
    {
        static::container()->bind($key);
    }

    public static function resolve(string $key)
    {
        return static::container()->resolve($key);
    }
}