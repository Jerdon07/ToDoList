<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'util/functions.php';

spl_autoload_register(function($class) {
    require base_path("/util/{$class}.php");
});

require base_path('util/router.php');