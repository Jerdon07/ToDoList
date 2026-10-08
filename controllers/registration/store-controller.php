<?php

use Request\RegistrationRequest;
use util\App;
use util\Auth;
use util\Database;
use util\Session;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

$request = new RegistrationRequest;

/* Validate the request */
if (! $request->validate($name, $email, $password)) {

    Session::flash('errors', $request->errors());

    redirect('/register');
}

$db = App::resolve(Database::class);

/* Check for existing user */
$existing_user = $db->query(
    "SELECT * FROM users WHERE email = :email", [
        ':email' => $email,
    ]
)->find();

/* If exists, display an error and exit */
if ($existing_user) {
    $request->error('email', 'An account with this email already exists.');

    Session::flash('old', [
        'name' => $name,
        'email' => $email,
    ]);

    Session::flash('errors', $request->errors());

    redirect('/register');
}

/* Save the POST request to the database */
$db->query("INSERT INTO users(name, email, password) VALUES (:name, :email, :password)", [
    ':name' => $name,
    ':email' => $email,
    ':password' => password_hash($password, PASSWORD_BCRYPT),
]);

/* Retrieve and log the user */
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    ":email" => $email
])->findOrFail();

$auth = new Auth;

$auth->login([
    'id' => $user['id'],
    'email' => $user['email'],
    'name' => $user['name'],
]);

redirect('/');