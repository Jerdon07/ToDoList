<?php

namespace util;

class App
{
    private static object $container;

    public static function setContainer(object $container)
    {
        static::$container = $container;
    }

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