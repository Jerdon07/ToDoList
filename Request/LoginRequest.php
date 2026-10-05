<?php

namespace Request;

use util\Validator;

class LoginRequest
{
    private $errors = [];

    /**
     * Validate the email and password request
     */
    public function validate(string $email, string $password): array|bool
    {
        if (! Validator::email($email)) {
            $this->errors['email'] = "A valid email is required";
        }

        if (! Validator::string($password)) {
            $this->errors['password'] = "A password with no more than 255 characters is required.";
        }

        return empty($this->errors);
    }

    /**
     * Errors' getter function
     */
    public function errors()
    {
        return $this->errors;
    }
}