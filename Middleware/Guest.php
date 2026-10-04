<?php

namespace Middleware;

class Guest
{
    public static function handle()
    {
        if (isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}