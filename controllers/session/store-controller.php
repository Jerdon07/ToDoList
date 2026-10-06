<?php

use Request\LoginRequest;
use util\App;
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

$user = $db->query(
    "SELECT * FROM users WHERE email = :email", [
        ':email' => $email,
    ]
)->find();

if (empty($user) || !password_verify($password, $user['password'])) {
    $errors['email'] = "No matching account found for that email address and password";

    view('session/create.view.php', [
        'heading' => 'Login',
        'errors' => $errors,
    ]);

    die();
}

login([
    'id' => $user['id'],
    'email' => $email,
    'name' => $user['name'],
]);

header('location: /');

exit();