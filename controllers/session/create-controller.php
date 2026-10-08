<?php

view('session/create.view.php', [
    'heading' => 'Login',
    'errors' => $_SESSION['flash']['errors'] ?? []
]);