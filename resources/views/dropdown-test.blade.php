<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dropdown Test - {{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Styles -->
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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Dropdown Test</h1>
            </div>
        </header>

        <main class="bg-gray-50 dark:bg-gray-900 min-h-screen p-8">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Alpine.js Test</h2>
                    <div x-data="{ message: 'Alpine.js is working!' }" class="mb-4">
                        <p x-text="message" class="text-gray-700 dark:text-gray-300"></p>
                        <button @click="message = 'Button clicked!'"
                            class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Click me to test Alpine.js
                        </button>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Custom Dropdown Test</h2>

                    <!-- Test Dropdown -->
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Test Dropdown
                                <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="#"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                Option 1
                            </x-dropdown-link>
                            <x-dropdown-link href="#"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                Option 2
                            </x-dropdown-link>
                            <x-dropdown-link href="#"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                Option 3
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Instructions</h2>
                    <div class="text-gray-700 dark:text-gray-300 space-y-2">
                        <p><strong>To test the dropdown functionality:</strong></p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Click the "Test Dropdown" button above</li>
                            <li>Try clicking outside the dropdown to close it</li>
                            <li>Try pressing the ESC key to close it</li>
                            <li>Check the user menu in the top navigation (if logged in)</li>
                            <li>On mobile, test the hamburger menu</li>
                        </ul>
                        <p class="mt-4"><strong>Console:</strong> Open developer tools (F12) to see if there are any
                            JavaScript errors.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Debug Alpine.js
        document.addEventListener('alpine:init', () => {
            console.log('Alpine.js initialized successfully!');
        });

        // Debug DOM
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM Content Loaded');
            console.log('Alpine object:', window.Alpine);
        });
    </script>
</body>

</html>
