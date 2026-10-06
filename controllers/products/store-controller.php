<?php

use Request\ProductRequest;
use util\App;
use util\Database;

$db = App::resolve(Database::class);

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$request = new ProductRequest;

if (! $request->validate($name, $price, $quantity)) {
    view('products/create.view.php', [
        'heading' => 'Add a Product',
        'errors' => $request->errors(),
    ]);

    exit();
}

$current_user = 18;
$db->query(
    "INSERT INTO products(name, price, quantity, user_id) VALUES(:name, :price, :quantity, :user_id)",
    [
        ":name" => $name,
        ":price" => $price,
        ":quantity" => $quantity,
        ":user_id" => $current_user,
    ]
);

redirect('/products');