<?php

use Request\LoginRequest;
use util\Auth;

$email = $_POST['email'];
$password = $_POST['password'];

$request = new LoginRequest;

/* Validate the request */
if ($request->validate($email, $password)) {
    
    /* Authenticate the user */
    if ((new Auth)->handle($email, $password)) redirect('/');

    $request->error('email', 'No matching account for that email address and password.');
}

$_SESSION['flash']['errors'] = $request->errors();

redirect('/login');