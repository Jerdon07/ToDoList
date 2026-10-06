<?php

use util\App;
use util\Database;
use util\Response;

$db = App::resolve(Database::class);

$product = $db->query(
    "SELECT * FROM products WHERE id = :id", 
    [":id" => $_GET['id']]
)->findOrFail();

if (! $product) {
    abort(Response::NOT_FOUND);
}

authorize($product['user_id'] == $_SESSION['user']['id'], Response::FORBIDDEN);

view('products/edit.view.php', [
    'heading' => $product['name'],
    'product' => $product,
]);