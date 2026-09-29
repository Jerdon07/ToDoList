<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "My Products";

$products = $db->query("SELECT * FROM products WHERE id = 1")->fetchAll();

require 'views/product.view.php';