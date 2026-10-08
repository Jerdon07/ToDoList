<?php

view('products/create.view.php', [
    'heading' => 'Add a Product',
    'product' => $_SESSION['flash']['old'] ?? [],
    'errors' => $_SESSION['flash']['errors'] ?? [],
]);