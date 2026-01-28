<!DOCTYPE html>
<html class="dark" lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="bg-background-light dark:bg-background-dark font-display min-h-screen flex flex-col transition-colors duration-300">
        <header
            class="sticky top-0 z-50 w-full border-b border-gray-200 dark:border-[#233648] bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md"
        >
            <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center size-10 rounded-lg bg-primary text-white">
                            <span class="material-symbols-outlined">database</span>
                        </div>
                        <h1 class="text-gray-900 dark:text-white text-lg font-bold tracking-tight">Human to Eloquent</h1>
                    </div>
                    <nav class="hidden md:flex items-center gap-8">
                        <a
                            class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors"
                            href="#"
                        >
                            Cómo funciona
                        </a>
                        <a
                            class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors"
                            href="#"
                        >
                            Documentación
                        </a>
                        <a
                            class="flex items-center justify-center p-2 rounded-xl bg-gray-100 dark:bg-[#233648] text-gray-700 dark:text-white hover:bg-gray-200 dark:hover:bg-[#2d455c] transition-colors"
                            href="#"
                        >
                            <span class="material-symbols-outlined text-[20px]">account_tree</span>
                        </a>
                    </nav>
                </div>
            </div>
        </header>

        {{ $slot }}

        <footer class="border-t border-gray-200 dark:border-[#233648] py-10 bg-white dark:bg-[#101922]">
            <div
                class="max-w-[1200px] mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left"
            >
                <div class="flex flex-col gap-2">
                    <div class="flex items-center justify-center md:justify-start gap-2 text-gray-900 dark:text-white font-bold">
                        <span class="material-symbols-outlined text-primary">database</span>
                        Human to Eloquent
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">
                        © 2026 - Herramientas para Desarrolladores Laravel
                    </p>
                </div>
                <div class="flex items-center gap-6">
                    <div
                        class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-500/10 text-red-500 text-xs font-bold border border-red-500/20"
                    >
                        <span class="material-symbols-outlined text-sm">favorite</span>
                        <span>Hecho por YouDevs para ti</span>
                    </div>
                    <div class="flex gap-4">
                        <a class="text-gray-400 hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined">brand_family</span>
                        </a>
                        <a class="text-gray-400 hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined">terminal</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>