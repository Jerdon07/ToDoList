<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Delete -->
        <div class="h-12 w-full flex justify-end items-end">
            <form method="POST">
                <input 
                    type="hidden"
                    name="id"
                    value="<?= $product['id'] ?>"
                >

                <button
                    class="w-fit px-4 py-2 rounded-full flex items-center justify-center bg-red-600 text-white font-bold hover:bg-red-700"
                    type="submit"
                >
                    Delete
                </button>
            </form>
        </div>

        <!-- Product -->
        <p><?= htmlspecialchars($product['name']) ?> is <?= htmlspecialchars($product['price']) ?> pesos.</p>
    </div>
</main>
<?php view('partials/footer.php') ?>