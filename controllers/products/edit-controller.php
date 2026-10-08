<?php

use util\App;
use util\Database;
use util\Response;

$db = App::resolve(Database::class);

$product = $db->query(
    "SELECT * FROM products WHERE id = :id", 
    [":id" => $_GET['id'] ?? $_SESSION['flash']['old']['id']]
)->findOrFail();

authorize($product['user_id'] == $_SESSION['user']['id'], Response::FORBIDDEN);

view('products/edit.view.php', [
    'heading' => $product['name'],
    'product' => $_SESSION['flash']['old'] ?? $product,
    'errors' => $_SESSION['flash']['errors'] ?? [],
]);