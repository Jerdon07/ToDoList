<?php

use util\Session;

view('registration/create.view.php', [
    'heading' => 'Register',
    'errors' => Session::get('errors'),
    'data' => Session::get('old'),
]);