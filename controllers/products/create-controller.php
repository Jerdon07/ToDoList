<?php

require 'Validator.php';

$heading = "Add a product";

$config = require "config.php";
$db = new Database($config['database']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    if (! Validator::string($_POST['name'])) {
        $errors['name'] = "A name with no more than 255 characters is required.";
    }

    if (! Validator::int($_POST['price'])) {
        $errors['price'] = "A product needs a valid price.";
    }

    if (! Validator::int($_POST['quantity'])) {
        $errors['quantity'] = "A product should have a valid quantity.";
    }

    if (empty($errors)) {
        $current_user = 3;
        $db->query(
            "INSERT INTO products(name, price, quantity, user_id) VALUES(:name, :price, :quantity, :user_id)",
            [
                ":name" => $_POST["name"],
                ":price" => $_POST["price"],
                ":quantity" => $_POST["quantity"],
                ":user_id" => $current_user,
            ]
        );
    }

}

require 'views/products/create.view.php';