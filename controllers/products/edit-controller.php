<?php

use util\App;
use util\Database;
use util\Response;
use util\Session;

$db = App::resolve(Database::class);

$product = $db->query(
    "SELECT * FROM products WHERE id = :id", 
    [":id" => $_GET['id'] ?? $_SESSION['flash']['old']['id']]
)->findOrFail();

authorize($product['user_id'] == $_SESSION['user']['id'], Response::FORBIDDEN);

view('products/edit.view.php', [
    'heading' => $product['name'],
    'product' => Session::get('old', $product),
    'errors' => Session::get('errors'),
]);