<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Styles -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script>
        // Initial theme check to prevent FOUC (Flash of Unstyled Content)
        if (localStorage.getItem('color-theme') === 'dark' ||
            (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-white dark:bg-gray-900 transition-colors duration-200">
    <div class="min-h-full">
        @include('layouts.navigation')
        <header class="bg-white dark:bg-gray-800 shadow dark:shadow-gray-700/50">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Dashboard</h1>
            </div>
        </header>
        <main class="bg-gray-50 dark:bg-gray-900 min-h-screen">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
