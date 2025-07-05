<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles / Scripts -->

    <script>
        // Initial theme check to prevent FOUC (Flash of Unstyled Content)
        if (localStorage.getItem('color-theme') === 'dark' ||
            (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <script>
        // FadeDown animation
        var grids = document.querySelectorAll('#fade-animationDown');
        grids.forEach(function(grid) {
            if (!grid) return;
            grid.style.opacity = '0';
            var animated = false;
            var skillObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting && !animated) {
                        grid.classList.add('animate__animated', 'animate__fadeInDown');
                        grid.style.opacity = '1';
                        animated = true;
                        skillObserver.disconnect();
                    }
                });
            }, {
                threshold: 0.3
            });
            skillObserver.observe(grid);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif

    <style>
        .crop-top {
            object-fit: cover;
            object-position: top center;
            height: 80%;
            /* Adjust this value to crop more from the top */
        }

        .crop-top-third {
            object-fit: cover;
            object-position: top;
            height: 100%;
            clip-path: inset(33% 10% 5% 10%);
            /* Crop the top third */
        }

        .shadow-custom {
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5);
        }

        .hover-box {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .hover-box:hover {
            transform: translateY(-10px);
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body
    class="font-sans antialiased bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <div class="min-h-screen transition-colors duration-300">
        <header
            class="fixed top-2 left-1/2 transform -translate-x-1/2 z-50 bg-gray-900/10 dark:bg-gray-800/20 backdrop-blur-lg shadow-lg transition-colors duration-300 rounded-3xl">
            <nav class="flex items-center justify-center p-2 lg:px-8" aria-label="Global">
                <div class="hidden lg:flex lg:gap-x-4 items-center">
                    <a href="#about"
                        class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2.5 inline-flex items-center transition-all duration-200">{{ __('app.about') }}</a>
                    <a href="#projects"
                        class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2.5 inline-flex items-center transition-all duration-200">{{ __('app.projects') }}</a>
                    <a href="#contact"
                        class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2.5 inline-flex items-center transition-all duration-200">{{ __('app.contact') }}</a>
                    {{-- <a href="#"
                        class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2.5 inline-flex items-center transition-all duration-200">{{ __('app.company') }}</a> --}}
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2.5 inline-flex items-center transition-all duration-200">{{ __('app.dashboard') }}</a>
                    @else
                        {{-- <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-white">{{ __('app.login') }} <span
                    aria-hidden="true">&rarr;</span></a> --}}
                    @endauth
                    <!-- Enhanced Theme toggle button -->
                    <x-theme-toggle />
                    <!-- Language selector -->
                    <x-language-selector />
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button id="mobile-menu-button" type="button"
                        class="-m-2.5 rounded-md p-2.5 text-white dark:text-gray-300">
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div id="mobile-menu" class="lg:hidden hidden fixed inset-0 z-50" role="dialog" aria-modal="true">
                <!-- Background backdrop -->
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" aria-hidden="true"></div>

                <!-- Panel -->
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full max-w-sm overflow-y-auto bg-white dark:bg-gray-900 shadow-xl">
                    <div class="flex h-full flex-col">
                        <!-- Header -->
                        <div
                            class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <span class="text-xl font-bold text-gray-900 dark:text-white">Menu</span>
                            </div>
                            <button id="mobile-menu-close-button" type="button"
                                class="-m-2.5 rounded-md p-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Navigation Links -->
                        <div class="flex-1 px-6 py-6">
                            <nav class="space-y-3">
                                <a href="#about" id="mobile-about-link"
                                    class="flex items-center rounded-lg px-3 py-3 text-base font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    {{ __('app.about') }}
                                </a>
                                <a href="#projects" id="mobile-projects-link"
                                    class="flex items-center rounded-lg px-3 py-3 text-base font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                        </path>
                                    </svg>
                                    {{ __('app.projects') }}
                                </a>
                                <a href="#contact" id="mobile-contact-link"
                                    class="flex items-center rounded-lg px-3 py-3 text-base font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ __('app.contact') }}
                                </a>

                                @auth
                                    <a href="{{ route('dashboard') }}" id="mobile-dashboard-link"
                                        class="flex items-center rounded-lg px-3 py-3 text-base font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                            </path>
                                        </svg>
                                        {{ __('app.dashboard') }}
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" id="mobile-login-link"
                                        class="flex items-center rounded-lg px-3 py-3 text-base font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        {{ __('app.login') }}
                                    </a>
                                @endauth
                            </nav>
                        </div>

                        <!-- Settings Section -->
                        <div class="border-t border-gray-200 dark:border-gray-700 p-6">
                            <div class="space-y-4">
                                <!-- Theme Toggle -->
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">Theme</span>
                                    <x-theme-toggle class="scale-75" />
                                </div>

                                <!-- Language Selector -->
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">Language</span>
                                    <x-language-selector />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
            <!-- Typewriter Animation Background -->
            <div class="absolute inset-0 -z-10 flex items-center justify-center pointer-events-none w-full h-full">
                <div class="w-full h-full bg-black/80 shadow-2xl border-2 border-gray-800 relative overflow-hidden"
                    style="backdrop-filter: blur(3px); filter: blur(1.5px); border-radius: 0;">
                    <pre id="typewriter-bg"
                        class="text-green-400 text-xs font-mono whitespace-pre leading-snug select-none w-full h-full m-0 p-8"></pre>
                    <span id="typewriter-cursor-bg"
                        class="absolute left-0 top-0 text-green-400 text-xs font-mono animate-pulse"
                        style="margin: 18px 0 0 8px;">|</span>
                </div>
            </div>


            <!-- Hero Section -->
            <section
                class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center justify-between mb-16 gap-10 px-4">
                <div id="fade-animationLeft" class="flex-1 text-center lg:text-left">
                    <h1
                        class="text-4xl lg:text-6xl font-bold mb-6 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        {{ __('app.pre_intro_name') }} <br>
                        <span class="text-blue-600 dark:text-blue-400">{{ __('app.intro_name') }}</span>
                    </h1>

                    <!-- Typing Animation -->
                    <div
                        class="text-2xl lg:text-3xl font-semibold mb-4 h-12 flex items-center justify-center lg:justify-start">
                        <span id="typewriter" class="text-blue-600 dark:text-blue-400 ml-2"></span>
                        <span id="cursor" class="text-blue-600 dark:text-blue-400 animate-pulse">|</span>
                    </div>

                    <p class="text-xl text-gray-300 mb-8">
                        {{ __('app.intro_description') }}
                    </p>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                        <span
                            class="px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm font-medium">
                            {{ __('app.frontend_focused') }}
                        </span>
                        <span
                            class="px-4 py-2 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full text-sm font-medium">
                            {{ __('app.fullstack_learning') }}
                        </span>
                    </div>
                </div>
                <div id="fade-animationRight" class="flex-1 flex justify-center lg:justify-end">
                    <img src="{{ asset('img/frontend-focus.svg') }}" alt="Frontend Focus"
                        class="w-96 h-96 object-contain drop-shadow-xl bg-transparent animate-bounce-slow"
                        style="background: none;">
                </div>
            </section>
        </div>
        <!-- About Section Component -->
        <x-about-section />
        <!-- Projects Section Component -->
        <x-projects-section :projects="$projects" />

        <!-- Contact Section Component -->
        <x-contact-section />
    </div>

    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto text-center">
            <p class="text-sm">© {{ date('Y') }} F.Nimród Lobozár. {{ __('app.footer_rights') }}.</p>
            <p class="text-xs mt-2">{{ __('app.footer_made_with') }} <span class="text-red-500">&hearts;</span>
                {{ __('app.footer_technologies') }}</p>
        </div>
    </footer>
    </div>
    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenuCloseButton = document.getElementById('mobile-menu-close-button');
            const mobileMenu = document.getElementById('mobile-menu');

            // Open mobile menu
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent scrolling when menu is open
            });

            // Close mobile menu
            mobileMenuCloseButton.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = 'auto'; // Restore scrolling
            });

            // Close menu when clicking on backdrop
            mobileMenu.addEventListener('click', function(e) {
                if (e.target === mobileMenu || e.target.classList.contains('backdrop-blur-sm')) {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });

            // Close menu when clicking on navigation links
            const mobileLinks = document.querySelectorAll('#mobile-menu a[href^="#"]');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                });
            });

            // Smooth scrolling for all anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>

    <!-- Fallback theme toggle script -->
    <script>
        // Immediate theme toggle fallback
    </script>
</body>

</html>
