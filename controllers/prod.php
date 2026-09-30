<?php

$config = require 'config.php';
$db = new Database($config['database']);

$product = $db->query(
    "SELECT * FROM products WHERE id = :id", 
    [":id" => $_GET['id']]
)->fetch();

if (! $product) {
    abort(Response::NOT_FOUND);
}

$current_user = 3;
if ($product['user_id'] !== $current_user) {
    abort(Response::FORBIDDEN);
}

$heading = $product['name'];

require 'views/prod.view.php';