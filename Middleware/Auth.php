<?php

namespace Middleware;

class Auth
{
    public function handle()
    {
        if (empty($_SESSION['user'])) {
            redirect('/register');
        }
    }
}