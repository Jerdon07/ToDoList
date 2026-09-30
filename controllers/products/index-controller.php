<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$products = $db->query("SELECT * FROM products WHERE user_id = 3")->get();

view('products/index.view.php', [
    'heading' => 'My Products',
    'products' => $products,
]);