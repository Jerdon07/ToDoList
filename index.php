<?php

require 'functions.php';
require 'Database.php';

$config = [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'product_db',
    'charset' => 'utf8mb4',
];

$db = new Database($config);
$products = $db->query("SELECT * FROM products")->fetch(PDO::FETCH_ASSOC);

require 'router.php';