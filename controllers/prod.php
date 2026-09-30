<?php

$config = require 'config.php';
$db = new Database($config['database']);

$product = $db->query(
    "SELECT * FROM products WHERE id = :id", 
    [":id" => $_GET['id']]
)->findOrFail();

if (! $product) {
    abort(Response::NOT_FOUND);
}

$current_user = 3;
authorize($product['user_id'] == $current_user, Response::FORBIDDEN);

$heading = $product['name'];

require 'views/prod.view.php';