<?php

$heading = "Add a product";

$config = require "config.php";
$db = new Database($config['database']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    if (strlen($_POST['name']) === 0) {
        $errors['name'] = "A product name is required.";
    }

    if (strlen($_POST['name'] > 255)) {
        $errors['name'] = "The name cannot be more than 255 characters.";
    }

    if (strlen($_POST['price']) === 0) {
        $errors['price'] = "A product needs a price.";
    }

    if (strlen($_POST['quantity']) === 0) {
        $errors['quantity'] = "A product should have a quantity.";
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

require 'views/product-create.view.php';