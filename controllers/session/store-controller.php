<?php

use Request\LoginRequest;
use util\Auth;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

$request = new LoginRequest;

/* Validate the request */
if (! $request->validate($email, $password)) {
    view('session/create.view.php', [
        'heading' => 'Log In',
        'errors' => $request->errors(),
    ]);

    exit();
};

$auth = new Auth();

if (! $auth->handle($email, $password)) {
    return view('session/create.view.php', [
        'heading' => 'Login',
        'errors' => ['email' => 'No matching account for that email address and password.']
    ]);
}

redirect('/');