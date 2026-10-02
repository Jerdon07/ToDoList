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
}