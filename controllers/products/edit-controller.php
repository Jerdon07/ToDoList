<?php

use util\App;
use util\Database;
use util\Response;

$db = App::resolve(Database::class);

$current_user = 3;

$product = $db->query(
    "SELECT * FROM products WHERE id = :id", 
    [":id" => $_GET['id']]
)->findOrFail();

if (! $product) {
    abort(Response::NOT_FOUND);
}

authorize($product['user_id'] == $current_user, Response::FORBIDDEN);

view('products/edit.view.php', [
    'heading' => $product['name'],
    'product' => $product,
]);