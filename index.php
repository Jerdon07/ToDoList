<?php

require 'functions.php';
require 'Database.php';
$config = require 'config.php';

$db = new Database($config);
$products = $db->query("SELECT * FROM products")->fetchAll();
var_dump($products);
require 'router.php';