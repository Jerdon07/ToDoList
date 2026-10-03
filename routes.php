<?php

use util\Router;

$router = new Router;

$router->get('/', 'controllers/index.php');

$router->get('/products', 'controllers/products/index-controller.php');

$router->get('/products/create', 'controllers/products/create-controller.php');
$router->post('/products/create', 'controllers/products/store-controller.php');

$router->get('/product', 'controllers/products/show-controller.php');

$router->get('/product/edit', 'controllers/products/edit-controller.php');
$router->put('/product/edit', 'controllers/products/update-controller.php');

$router->delete('/product', 'controllers/products/destroy-controller.php');
