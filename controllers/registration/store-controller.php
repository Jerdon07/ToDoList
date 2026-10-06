<?php

use Request\RegistrationRequest;
use util\App;
use util\Database;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

$request = new RegistrationRequest;

/* Validate the request */
if (! $request->validate($name, $email, $password)) {
    view('registration/create.view.php', [
        'heading' => 'Register',
        'errors' => $request->errors(),
    ]);

    die();
}

$db = App::resolve(Database::class);

$existing_user = $db->query(
    "SELECT * FROM users WHERE email = :email", [
        ':email' => $email,
    ]
)->find();

if ($existing_user) {
    $errors['email'] = 'An account with this email already exists.';

    view('registration/create.view.php', [
        'heading' => 'Register',
        'error' => $errors,
    ]);

    die();
}

$db->query("INSERT INTO users(name, email, password) VALUES (:name, :email, :password)", [
    ':name' => $name,
    ':email' => $email,
    ':password' => password_hash($password, PASSWORD_BCRYPT),
]);

$_SESSION['user'] = [
    'id' => $_POST['id'],
    'email' => $email,
    'name' => $name,
];

header('location: /');
exit();