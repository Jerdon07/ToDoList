<?php

use util\Session;

view('session/create.view.php', [
    'heading' => 'Login',
    'data' => Session::get('old'),
    'errors' => Session::get('errors'),
]);