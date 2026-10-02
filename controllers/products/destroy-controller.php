<?php

use util\App;
use util\Database;
use util\Response;

$db = App::resolve(Database::class);

$current_user = 3;

$product = $db->query(
    "SELECT * FROM products WHERE id = :id",
    [':id' => $_POST['id']],
)->findOrFail();

authorize($product['user_id'] === $current_user, Response::FORBIDDEN);

$db->query(
    "DELETE FROM products WHERE id = :id",
    [":id" => $_POST['id']],
);

header('location: /products');

exit();