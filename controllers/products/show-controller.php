<?php

use util\Database;
use util\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$current_user = 3;

$product = $db->query(
    "SELECT * FROM products WHERE id = :id", 
    [":id" => $_GET['id']]
)->findOrFail();

if (! $product) {
    abort(Response::NOT_FOUND);
}

authorize($product['user_id'] == $current_user, Response::FORBIDDEN);

view('products/show.view.php', [
    'heading' => $product['name'],
    'product' => $product,
]);