<?php

require 'functions.php';
require 'Database.php';

$db = new Database();
$products = $db->query("SELECT * FROM products")->fetch(PDO::FETCH_ASSOC);

require 'router.php';