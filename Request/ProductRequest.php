<?php

namespace Request;

use util\Validator;

class ProductRequest
{
    private $errors = [];

    /**
     * Validate the product request
     */
    public function validate(string $name, string $price, string $quantity)
    {
        if (! Validator::string($name)) {
            $this->errors['name'] = "A name with no more than 255 characters is required.";
        }

        if (! Validator::int($price, 1)) {
            $this->errors['price'] = "A product needs a valid price.";
        }

        if (! Validator::int($quantity)) {
            $this->errors['quantity'] = "A product should have a valid quantity.";
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