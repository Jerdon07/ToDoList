<?php

require 'functions.php';
require 'Database.php';
$config = require 'config.php';

$db = new Database($config['database']);
$products = $db->query("SELECT * FROM products")->fetchAll();
require 'router.php';