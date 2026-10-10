<?php

use Request\ProductRequest;
use util\App;
use util\Database;

/* Set response content as JSON */
header('Content-Type: application/json');

$db = App::resolve(Database::class);

$name = $_POST['name'] ?? '';
$price = $_POST['price'] ?? '';
$quantity = $_POST['quantity'] ?? '';

$request = new ProductRequest;

/* Validation */
if (! $request->validate($name, $price, $quantity)) {

    http_response_code(422);

    // Send response thru json
    echo json_encode([
        'errors' => $request->errors(),
    ]);

    exit;
}

/* Database Insertion */
$db->query("INSERT INTO products(name, price, quantity, user_id) VALUES(:name, :price, :quantity, :user_id)", [
    ":name" => $name,
    ":price" => $price,
    ":quantity" => $quantity,
    ":user_id" => $_SESSION['user']['id'],
]);

/* Get the inserted product */
$productId = $db->lastInsertId();

/* Return response */
http_response_code(201);
echo json_encode([
    'status' => 'success',
    'product' => [
        'id' => $productId,
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity
    ]
]);

exit;