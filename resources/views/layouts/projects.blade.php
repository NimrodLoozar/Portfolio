<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-white dark:bg-gray-900 transition-colors duration-200">
    <div class="min-h-full">
        @include('layouts.navigation')

        <main class="h-full bg-gray-50 dark:bg-gray-900 flex flex-col items-center justify-center">

            {{ $slot }}

        </main>
    </div>
</body>

</html>
