<?php

$config = require 'config.php';
$db = new Database($config['database']);

$product = $db->query(
    "SELECT * FROM products WHERE id = :id", 
    [":id" => $_GET['id']]
)->fetch();

$heading = $product['name'];

require 'views/prod.view.php';