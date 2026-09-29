<?php

$config = require 'config.php';
$db = new Database($config['database']);

$product = $db->query(
    "SELECT * FROM products WHERE id = :id", 
    [":id" => $_GET['id']]
)->fetch();

if (! $product) {
    abort();
}

if ($product['user_id'] !== 3) {
    abort(403);
    dd('Hello');
}

$heading = $product['name'];

require 'views/prod.view.php';