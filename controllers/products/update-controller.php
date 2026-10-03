<?php

use util\App;
use util\Database;
use util\Response;
use util\Validator;

$db = App::resolve(Database::class);

$current_user = 3;

if (! $_POST['id']) {
    abort(Response::NOT_FOUND);
}

authorize($_POST['user_id'] == $current_user, Response::FORBIDDEN);

$product = $db->query("SELECT * FROM products WHERE id = :id", [
    ':id' => $_POST['id'],
])->findOrFail();

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

if (count($errors)) {
    return view('products/edit.view.php', [
        'heading' => 'Edit Product',
        'product' => $product,
        'errors' => $errors,
    ]);
}

$product = $db->query(
    "UPDATE products SET name = :name, price = :price, quantity = :quantity WHERE id = :id", [
        ":id" => $_POST['id'],
        ":name" => $_POST['name'],
        ":price" => $_POST['price'],
        ":quantity" => $_POST['quantity'],
    ]
);

header('location: /products');
die();