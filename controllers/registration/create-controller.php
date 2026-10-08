<?php

view('registration/create.view.php', [
    'heading' => 'Register',
    'errors' => $_SESSION['flash']['errors'] ?? [],
    'data' => $_SESSION['flash']['old'] ?? [],
]);