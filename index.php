<?php

require 'functions.php';
require 'Database.php';
$config = require 'config.php';

$db = new Database($config['database']);
$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id = {$id}";
$product = $db->query($query)->fetch();

dd($product);
require 'router.php';