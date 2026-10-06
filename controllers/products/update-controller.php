<?php

use Request\ProductRequest;
use util\App;
use util\Database;
use util\Response;
use util\Validator;

$db = App::resolve(Database::class);

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

if (! $id) {
    abort(Response::NOT_FOUND);
}

authorize($_POST['user_id'] == $_SESSION['user']['id'], Response::FORBIDDEN);

$product = $db->query("SELECT * FROM products WHERE id = :id", [
    ':id' => $id,
])->findOrFail();

$request = new ProductRequest;

if (! $request->validate($name, $price, $quantity)) {

    return view('products/edit.view.php', [
        'heading' => 'Edit Product',
        'product' => $product,
        'errors' => $request->errors(),
    ]);
}

$product = $db->query(
    "UPDATE products SET name = :name, price = :price, quantity = :quantity WHERE id = :id", [
        ":id" => $id,
        ":name" => $name,
        ":price" => $price,
        ":quantity" => $quantity,
    ]
);

redirect('/products');