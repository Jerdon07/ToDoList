<?php

use Request\ProductRequest;
use util\App;
use util\Database;
use util\Session;

$db = App::resolve(Database::class);

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$request = new ProductRequest;

if (! $request->validate($name, $price, $quantity)) {
    Session::flash('old', [
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity,
    ]);

    Session::flash('errors', $request->errors());

    redirect('/products/create');
}

$db->query(
    "INSERT INTO products(name, price, quantity, user_id) VALUES(:name, :price, :quantity, :user_id)", [
        ":name" => $name,
        ":price" => $price,
        ":quantity" => $quantity,
        ":user_id" => $_SESSION['user']['id'],
]);

redirect('/products');