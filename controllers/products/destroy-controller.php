<?php

use util\App;
use util\Database;
use util\Response;

$db = App::resolve(Database::class);

$product = $db->query(
    "SELECT * FROM products WHERE id = :id",
    [':id' => $_POST['id']],
)->findOrFail();

authorize($product['user_id'] === $_SESSION['user']['id'], Response::FORBIDDEN);

$db->query(
    "DELETE FROM products WHERE id = :id",
    [":id" => $_POST['id']],
);

redirect('/products');