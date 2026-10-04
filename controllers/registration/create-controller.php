<?php

if ($_SESSION['user']) {
    header('location: /');
    exit();
}

view('registration/create.view.php', [
    'heading' => 'Register'
]);