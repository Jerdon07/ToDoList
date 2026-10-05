<?php

use util\Router;

$router = new Router;

/* Registration */
$router->get('/register', 'registration/create-controller.php')->only('guest');
$router->post('/register', 'registration/store-controller.php')->only('guest');

/* Login */
$router->get('/login', 'session/create-controller.php')->only('guest');
$router->post('/sessions', 'session/store-controller.php')->only('guest');
$router->delete('/sessions', 'session/delete-controller.php')->only('auth');

/* Product */
$router->get('/', 'index.php');

$router->get('/products', 'products/index-controller.php')->only('auth');

$router->get('/products/create', 'products/create-controller.php')->only('auth');
$router->post('/products/create', 'products/store-controller.php')->only('auth');

$router->get('/product', 'products/show-controller.php')->only('auth');

$router->get('/product/edit', 'products/edit-controller.php')->only('auth');
$router->put('/product/edit', 'products/update-controller.php')->only('auth');

$router->delete('/product', 'products/destroy-controller.php')->only('auth');
