<?php

use Request\LoginRequest;
use util\Auth;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

$request = new LoginRequest;

/* Validate the request */
if ($request->validate($email, $password)) {
    
    /* Authenticate the user */
    if ((new Auth)->handle($email, $password)) redirect('/');

    $request->error('email', 'No matching account for that email address and password.');
}

/* Throw an error */
return view('session/create.view.php', [
    'heading' => 'Login',
    'errors' => $request->errors()
]);