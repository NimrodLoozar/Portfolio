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
                    <a href="#"
                        class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2.5 inline-flex items-center transition-all duration-200">{{ __('app.company') }}</a>
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
            <div id="mobile-menu" class="lg:hidden hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div
                    class="fixed inset-y-0 right-0 z-500 w-full overflow-y-auto bg-white dark:bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 dark:sm:ring-gray-100/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                                alt="">
                        </a>
                        <button id="mobile-menu-close-button" type="button"
                            class="-m-2.5 rounded-md p-2.5 text-gray-700 dark:text-gray-300">
                            <span class="sr-only">Close menu</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="#about"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">{{ __('app.about') }}</a>
                                <a href="#projects"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">{{ __('app.projects') }}</a>
                                <a href="#contact"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">{{ __('app.contact') }}</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">{{ __('app.company') }}</a>
                                <!-- Enhanced Mobile theme toggle -->
                                <x-theme-toggle class="mt-2" />
                                <!-- Mobile Language selector -->
                                <div class="mt-2">
                                    <x-language-selector />
                                </div>
                            </div>
                            <div class="py-6">
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">{{ __('app.login') }}</a>
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
            <section class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center justify-between mb-16 gap-10 px-4">
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
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        document.getElementById('mobile-menu-close-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.add('hidden');
        });
    </script>

    <!-- Fallback theme toggle script -->
    <script>
        // Immediate theme toggle fallback
    </script>
</body>

</html>
