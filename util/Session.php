<?php

namespace util;

class Session
{
    /**
     * Check if a key exists
     */
    public static function has(string $key): bool
    {
        return (bool) static::get($key);
    }

    /**
     * Append a value to the session
     */
    public static function put(string $key, string $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get a value from the session
     */
    public static function get(string $key, $default = null): array|null
    {
        return $_SESSION['flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    /**
     * Stores a value to the session
     */
    public static function flash(string $key, array $value)
    {
        $_SESSION['flash'][$key] = $value;
    }
}