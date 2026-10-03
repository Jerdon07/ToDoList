<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="w-170 px-6 py-4 bg-white rounded-md">
            <form action="" method="POST" class="space-y-4">

                <!-- Name -->
                <div class="flex flex-col">
                    <label for="name" class="text-sm font-semibold">
                        Full Name <span class="text-red-500">*</span>
                    </label>

                    <input 
                        id="name" 
                        name="name" 
                        type="text"
                        class="border rounded-sm pl-2"
                        value="<?= $_POST['name'] ?? '' ?>"
                    >
                    <?php if(isset($errors['name'])) : ?>
                        <p class="text-xs text-red-500 font-semibold"><?= $errors['name'] ?></p>
                    <?php endif ?>
                </div>

                <!-- Credentials -->
                <div class="grid grid-cols-2 gap-4">  
                    
                        <!-- Email -->
                    <div class="flex flex-col">
                        <label for="price" class="text-sm font-semibold">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="border rounded-sm"
                            value="<?= $_POST['email'] ?? '' ?>"
                        >
                        <?php if(isset($errors['email'])) : ?>
                            <p class="text-xs text-red-500 font-semibold"><?= $errors['email'] ?></p>
                        <?php endif ?>
                    </div>

                    <!-- Quantity -->
                    <div class="flex flex-col">
                        <label for="quantity" class="text-sm font-semibold">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="password"
                            name="password" 
                            id="password"
                            class="border rounded-sm"
                            value="<?= $_POST['password'] ?? '' ?>"
                        >
                        <?php if(isset($errors['password'])) : ?>
                        <p class="text-xs text-red-500 font-semibold"><?= $errors['password'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                
                <!-- Submit Button -->
                 <div class="flex w-full h-fit items-end justify-end">
                     <input type="submit" value="Register" class="bg-purple-500 py-2 px-5 rounded-full text-white hover:bg-purple-700">
                 </div>
            </form>
        </div>
    </div>
</main>
<?php view('partials/footer.php') ?>