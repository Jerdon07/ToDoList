<?php

namespace Request;

use util\Validator;

class RegistrationRequest
{
    private $errors = [];

    /**
     * Validate the name, email, and password request
     */
    public function validate(string $name, string $email, string $password)
    {

        if (! Validator::string($name)) {
            $this->errors['name'] = "A name with no more than 255 characters is required.";
        }

        if (! Validator::email($email)) {
            $this->errors['email'] = "A valid email is required";
        }

        if (! Validator::string($password, 8)) {
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