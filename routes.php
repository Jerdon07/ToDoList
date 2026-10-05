<?php

use util\Router;

$router = new Router;

/* Registration */
$router->get('/register', 'controllers/registration/create-controller.php')->only('guest');
$router->post('/register', 'controllers/registration/store-controller.php')->only('guest');

/* Login */
$router->get('/login', 'controllers/session/create-controller.php')->only('guest');
$router->post('/sessions', 'controllers/session/store-controller.php')->only('guest');

/* Product */
$router->get('/', 'controllers/index.php');

$router->get('/products', 'controllers/products/index-controller.php')->only('auth');

$router->get('/products/create', 'controllers/products/create-controller.php')->only('auth');
$router->post('/products/create', 'controllers/products/store-controller.php')->only('auth');

$router->get('/product', 'controllers/products/show-controller.php')->only('auth');

$router->get('/product/edit', 'controllers/products/edit-controller.php')->only('auth');
$router->put('/product/edit', 'controllers/products/update-controller.php')->only('auth');

$router->delete('/product', 'controllers/products/destroy-controller.php')->only('auth');
