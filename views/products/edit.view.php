<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="w-170 px-6 py-4 bg-white rounded-md">
            <form action="/product/edit" method="POST" class="space-y-4">

                <input type="hidden" name="_method" value="PUT">

                <input type="hidden" name="id" value="<?= $product['id'] ?? [] ?>">

                <input type="hidden" name="user_id" value="<?= $product['user_id'] ?? [] ?>">

                <!-- Name -->
                <div class="flex flex-col">
                    <label for="name" class="text-sm font-semibold">
                        Product Name <span class="text-red-500">*</span>
                    </label>

                    <input 
                        id="name" 
                        name="name" 
                        type="text"
                        class="border rounded-sm pl-2"
                        value="<?= $product['name'] ?? [] ?>"
                    >
                    <?php if(isset($errors['name'])) : ?>
                        <p class="text-xs text-red-500 font-semibold"><?= $errors['name'] ?></p>
                    <?php endif ?>
                </div>

                <!-- Integers -->
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
                            class="border rounded-sm"
                            value="<?= $product['price'] ?>"
                        >
                        <?php if(isset($errors['price'])) : ?>
                            <p class="text-xs text-red-500 font-semibold"><?= $errors['price'] ?></p>
                        <?php endif ?>
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
                            class="border rounded-sm"
                            value="<?= $product['quantity'] ?>"
                        >
                        <?php if(isset($errors['quantity'])) : ?>
                        <p class="text-xs text-red-500 font-semibold"><?= $errors['quantity'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                
                <!-- Submit Button -->
                 <div class="flex w-full h-fit items-end justify-end">
                    <a href="/products" class="py-2 px-5 rounded-full text-red-500 hover:text-red-700 font-bold">Cancel</a>
                     <input type="submit" value="Update Product" class="bg-purple-500 py-2 px-5 rounded-full text-white hover:bg-purple-700">
                 </div>
            </form>
        </div>
    </div>
</main>
<?php view('partials/footer.php') ?>