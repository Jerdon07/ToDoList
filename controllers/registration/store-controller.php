<?php

use util\App;
use util\Database;
use util\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::string($name)) {
    $errors['name'] = "A name with no more than 255 characters is required.";
}

if (! Validator::email($email)) {
    $errors['email'] = "A valid email is required";
}

if (! Validator::string($password, 8)) {
    $errors['password'] = "A password with no more than 255 characters is required.";
}

if (! empty($errors)) {
    view('registration/create.view.php', [
        'heading' => 'Register',
        'errors' => $errors,
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
    ':password' => $password,
]);

$_SESSION['user'] = [
    'email' => $email,
];

view('registration/create.view.php', [
    'heading' => 'Register'
]);