<?php view('partials/head.php', ['script' => '/js/products/index.js']) ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main> 
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="h-12 w-full flex justify-end items-end">
            <!-- Create Button -->
            <button 
                id="openDialogBtn"
                class="w-fit px-4 py-2 rounded-full flex items-center justify-center bg-purple-500 text-white font-bold cursor-pointer hover:bg-purple-700"
            >
                Add Product
            </button>
        </div>

        <!-- Display List -->
        <ul id="productList" class="mt-4 space-y-2">
            <?php foreach ($products as $product) : ?>
                <li>
                    <a href="product?id=<?= $product['id'] ?>" class="hover:underline">
                        <?= htmlspecialchars($product['name']) ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</main>

<!-- Modal Dialog -->
<dialog id="productDialog" class="fixed inset-0 h-fit m-auto p-6 rounded-lg shadow-xl backdrop:bg-black/50">
    <h2 class="text-xl font-bold">Add Product</h2>
    <p class="text-sm text-gray-600 mb-4">Fill out the form to create a new product</p>

    <form id="productForm" action="/products/create" method="POST" class="space-y-4">

        <!-- Name -->
        <div class="flex flex-col">
            <label for="name" class="text-sm font-semibold">
                Product Name <span class="text-red-500">*</span>
            </label>

            <input 
                id="name" 
                name="name" 
                type="text"
                class="border rounded-sm p-2"
            >
            <p id="error-name" class="text-xs text-red-500 font-semibold mt-1 hidden"></p>
        </div>

        <!-- Price & Quantity -->
        <div class="grid grid-cols-2 gap-4">  
            <!-- Price -->
            <div class="flex flex-col">
                <label for="price" class="text-sm font-semibold">
                    Product Price <span class="text-red-500">*</span>
                </label>
                <input 
                    type="number" 
                    name="price" 
                    id="price"
                    class="border rounded-sm p-2"
                    step="0.01"
                >
                <p id="error-price" class="text-xs text-red-500 font-semibold mt-1 hidden"></p>
            </div>

            <!-- Quantity -->
            <div class="flex flex-col">
                <label for="quantity" class="text-sm font-semibold">
                    Product Quantity <span class="text-red-500">*</span>
                </label>
                <input 
                    type="number" 
                    name="quantity" 
                    id="quantity"
                    class="border rounded-sm p-2"
                >
                <p id="error-quantity" class="text-xs text-red-500 font-semibold mt-1 hidden"></p>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex w-full h-fit items-end justify-end space-x-2 pt-4">
            <button
                type="button"
                id="closeDialogBtn"
                class="bg-gray-500 py-2 px-5 rounded-full text-white hover:bg-gray-700"
            >
                Cancel
            </button>

            <button 
                type="submit" 
                class="bg-purple-500 py-2 px-5 rounded-full text-white hover:bg-purple-700 cursor-pointer"
            >
                Add Product
            </button>
        </div>
    </form>
</dialog>

<?php view('partials/footer.php') ?>