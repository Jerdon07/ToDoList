<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<?php require 'partials/banner.php' ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="h-12 w-full flex justify-end items-end">
            <!-- Create -->
            <a href="#" class="w-fit px-4 py-2 rounded-full flex items-center justify-center bg-purple-500 text-white font-bold hover:bg-purple-700">Add Product</a>
        </div>

        <!-- Display -->
        <ul>
            <?php foreach ($products as $product) : ?>
                <li>
                    <a href="product?id=<?= $product['id'] ?>" class="hover:underline">
                        <?= $product['name'] ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</main>
<?php require 'partials/footer.php' ?>