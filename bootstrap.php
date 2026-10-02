<?php

use util\App;
use util\Container;
use util\Database;

$container = new Container;

$container->bind('util\Database', function() {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

$db = $container->resolve('util\Database');

$students = [
    'student1' => 18,
    'student2' => 14,
];

App::setContainer($container);
