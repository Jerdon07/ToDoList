<?php

use Request\ProductRequest;
use util\App;
use util\Database;
use util\Response;
use util\Session;

authorize($_POST['user_id'] == $_SESSION['user']['id'], Response::FORBIDDEN);

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$db = App::resolve(Database::class);

$product = $db->query("SELECT * FROM products WHERE id = :id", [
    ':id' => $id,
])->findOrFail();

$request = new ProductRequest;

if (! $request->validate($name, $price, $quantity)) {

    Session::flash('old', [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity
    ]);

    Session::flash('errors', $request->errors());

    redirect('/product/edit');
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