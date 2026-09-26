<?php

require 'functions.php';

$dsn = "mysql:host=localhost;port=3306;dbname=product_db;user=root;charset=utf8mb4";

$pdo = new PDO($dsn);

$statement = $pdo->prepare("SELECT * FROM products");
$statement->execute();

$products = $statement->fetchAll(PDO::FETCH_ASSOC);

dd($products);

require 'router.php';