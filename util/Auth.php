<?php

namespace util;

class Auth
{
    /**
     * Handle user authenticaion
     */
    public function handle(string $email, string $password): bool
    {
        // Find if email exists
        $user = App::resolve(Database::class)
            ->query("SELECT * FROM users WHERE email = :email", [
                ':email' => $email,
        ])->find();

        if (empty($user) || !password_verify($password, $user['password'])) {
            return false;
        }

        // Log the user
        $this->login($user);

        return true;
    }

    /**
     * Create session
     */
    public function login(array $user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name'],
        ];

        session_regenerate_id(true);
    }

    /**
     * Destroy session
     */
    public static function logout()
    {
        $_SESSION = [];

        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}