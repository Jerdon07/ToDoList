<nav class="bg-purple-700">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Right (Logo Area) -->
                    <div>
                        <h3 class="font-bold">Product App</h3>
                    </div>

                    <!-- Left -->
                    <div class="flex items-baseline justify-between space-x-10">
                        <!-- Navigation -->
                        <div class="flex justify-between items-center space-x-4">
                            <a
                                href="/"
                                class="
                                    <?= urlIs('/') 
                                        ? 'bg-purple-900 text-white' 
                                        : 'bg-purple-700 text-purple-200 hover:bg-purple-700 hover-text-white' ?>
                                    px-3 py-2 rounded-md text-sm font-medium"

                            >
                                Home
                            </a>

                            <a 
                                href="/products" 
                                class="
                                    <?= urlIs('/products')
                                        ? 'bg-purple-900 text-white' 
                                        : 'bg-purple-700 text-purple-200 hover:bg-purple-700 hover-text-white' ?>
                                    px-3 py-2 rounded-md text-sm font-medium"
                            >
                                Products
                            </a>
                        </div>

                        <!-- Auth -->
                         <?php if ($_SESSION['user'] ?? false) : ?>
                            <p>User</p>
                        <?php else : ?>
                            <p>Guest</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </nav>