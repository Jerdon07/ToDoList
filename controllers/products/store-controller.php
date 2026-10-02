<?php

use util\App;
use util\Database;
use util\Validator;

$db = App::container()->resolve(Database::class);

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

if (! empty($errors)) {
    view('products/create.view.php', [
        'heading' => 'Add a Product',
        'errors' => $errors,
    ]);

    die();
}

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

header('location: /products');
die();