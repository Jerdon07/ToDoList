<?php

namespace Middleware;

class Auth
{
    public static function handle()
    {
        if (empty($_SESSION['user'])) {
            header('location: /register');
            exit();
        }
    }
}