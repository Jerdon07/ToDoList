<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>Hello <?= $_SESSION['user']['name'] ?? 'Guest' ?>. Welcome to the Home page.</p>
    </div>
</main>
<?php view('partials/footer.php') ?>