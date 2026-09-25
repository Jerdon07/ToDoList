<nav class="bg-purple-700">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo Area -->
                    <div>
                        <h3 class="font-bold">Product App</h3>
                    </div>

                    <!-- Navigation Area -->
                    <div class="flex items-baseline space-x-4">
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
                </div>
            </div>
        </nav>