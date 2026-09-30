<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<?php require 'partials/banner.php' ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form action="" method="POST">
            <label for="name">Product Name</label>
            <input 
                id="name" 
                name="name" 
                type="text"
                class="border rounded-sm"
            >

            <label for="price">Product Price</label>
            <input 
                type="number" 
                name="price" 
                id="price"
                class="border rounded-sm"
            >

            <label for="quantity">Product Quantity</label>
            <input 
                type="number" 
                name="quantity" 
                id="quantity"
                class="border rounded-sm"
            >

            <input type="submit" value="Add Product" class="bg-purple-500 py-2 px-5 rounded-full text-white">
        </form>
    </div>
</main>
<?php require 'partials/footer.php' ?>