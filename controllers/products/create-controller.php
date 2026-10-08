<?php

use util\Session;

view('products/create.view.php', [
    'heading' => 'Add a Product',
    'product' => Session::get('old'),
    'errors' => Session::get('errors'),
]);