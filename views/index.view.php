<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    <div class="min-h-full">
        <nav class="bg-purple-700">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo Area -->
                    <div>
                        <h3 class="font-bold">Product App</h3>
                    </div>

                    <!-- Navigation Area -->
                    <div class="flex items-baseline space-x-4">
                        <a href="/" class="bg-purple-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">
                            Home
                        </a>

                        <a href="/product.php" class="text-purple-200 hover:bg-purple-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Products
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-light text-purple-900">
                    Home
                </h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <p>Hello. Welcome to the Home page.</p>
            </div>
        </main>
    </div>
</body>
</html>