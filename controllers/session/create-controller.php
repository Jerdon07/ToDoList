<?php

view('session/create.view.php', [
    'heading' => 'Login',
    'data' => $_SESSION['flash']['old'] ?? [],
    'errors' => $_SESSION['flash']['errors'] ?? []
]);