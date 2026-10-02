<?php

use util\App;
use util\Database;

$db = App::resolve(Database::class);

$products = $db->query("SELECT * FROM products WHERE user_id = 3")->get();

view('products/index.view.php', [
    'heading' => 'My Products',
    'products' => $products,
]);