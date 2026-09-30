<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<?php require 'partials/banner.php' ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form action="" method="POST">
            <div>
                <label for="name">Product Name</label>
                <input 
                    id="name" 
                    name="name" 
                    type="text"
                    class="border rounded-sm"
                >
                <?php if(isset($errors['name'])) : ?>
                    <p><?= $errors['name'] ?></p>
                <?php endif ?>
            </div>

            <div>
                <label for="price">Product Price</label>
                <input 
                    type="number" 
                    name="price" 
                    id="price"
                    class="border rounded-sm"
                >
                <?php if(isset($errors['price'])) : ?>
                    <p><?= $errors['price'] ?></p>
                <?php endif ?>
            </div>

            <div>
                <label for="quantity">Product Quantity</label>
                <input 
                    type="number" 
                    name="quantity" 
                    id="quantity"
                    class="border rounded-sm"
                >
                <?php if(isset($errors['quantity'])) : ?>
                    <p><?= $errors['quantity'] ?></p>
                <?php endif ?>
            </div>

            <!-- Submit Button -->
            <input type="submit" value="Add Product" class="bg-purple-500 py-2 px-5 rounded-full text-white">
        </form>
    </div>
</main>
<?php require 'partials/footer.php' ?>