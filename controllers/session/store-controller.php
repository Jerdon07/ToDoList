<?php

use util\App;
use util\Database;
use util\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = "A valid email is required";
}

if (! Validator::string($password)) {
    $errors['password'] = "A password with no more than 255 characters is required.";
}

if (! empty($errors)) {
    view('session/create.view.php', [
        'heading' => 'Register',
        'errors' => $errors,
    ]);

    die();
}

$db = App::resolve(Database::class);

$user = $db->query(
    "SELECT * FROM users WHERE email = :email", [
        ':email' => $email,
    ]
)->find();

if (empty($user)) {
    $errors['email'] = "There's no user associated with this email.";

    view('session/create.view.php', [
        'heading' => 'Login',
        'errors' => $errors,
    ]);

    die();
}

if (! password_verify($password, $user['password'])) {
    $errors['password'] = "The password doesn't match.";

    view('session/create.view.php', [
        'heading' => 'Login',
        'errors' => $errors,
    ]);

    exit();
}

login([
    'email' => $email,
    'name' => $user['name'],
]);

header('location: /');

exit();