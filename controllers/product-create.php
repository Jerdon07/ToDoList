<?php

$heading = "Add a product";

$config = require "config.php";
$db = new Database($config['database']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

require 'views/product-create.view.php';