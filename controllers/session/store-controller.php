<?php

use Request\LoginRequest;
use util\App;
use util\Auth;
use util\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

$request = new LoginRequest;

/* Validate the request */
if (! $request->validate($email, $password)) {
    return view('session/create.view.php', [
        'heading' => 'Log In',
        'errors' => $request->errors(),
    ]);

    exit();
};

$db = App::resolve(Database::class);

$auth = new Auth();



if (! $auth->handle($email, $password)) {
    return view('session/create.view.php', [
        'heading' => 'Login',
        'errors' => ['email' => 'No matching account for that email address and password.']
    ]);
}

header('location: /');

exit();