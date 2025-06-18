<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles / Scripts -->
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

<body class="font-sans antialiased">
    <div class=" bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto"
                            src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button id="mobile-menu-button" type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#about" class="text-sm/6 font-semibold text-white">Over mij</a>
                    <a href="#projects" class="text-sm/6 font-semibold text-white">Pojecten</a>
                    <a href="#contact" class="text-sm/6 font-semibold text-white">Contact</a>
                    <a href="#" class="text-sm/6 font-semibold text-white">Company</a>
                </div>
                @auth
                    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                        <a href="{{ route('dashboard') }}"
                            class="text-sm/6 font-semibold text-white">{{ __('Dashboard') }}</a>
                    </div>
                @else
                    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                        <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-white">{{ __('Log in') }} <span
                                aria-hidden="true">&rarr;</span></a>
                    </div>
                @endauth
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div id="mobile-menu" class="lg:hidden hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                                alt="">
                        </a>
                        <button id="mobile-menu-close-button" type="button"
                            class="-m-2.5 rounded-md p-2.5 text-gray-700">
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
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-gray-50">Over
                                    mij</a>
                                <a href="#projects"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-gray-50">Projecten</a>
                                <a href="#contact"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-gray-50">Contact</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-gray-50">Company</a>
                            </div>
                            <div class="py-6">
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-white hover:bg-gray-50">Log
                                    in</a>
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
                <div class="flex-1 text-center lg:text-left">
                    <h1
                        class="text-4xl lg:text-6xl font-bold mb-6 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Hi, I'm <span class="text-blue-700 dark:text-blue-300">F.Nimród Lobozár</span>
                    </h1>

                    <!-- Typing Animation -->
                    <div
                        class="text-2xl lg:text-3xl font-semibold mb-4 h-12 flex items-center justify-center lg:justify-start">
                        <span id="typewriter" class="text-blue-600 dark:text-blue-400 ml-2"></span>
                        <span id="cursor" class="text-blue-600 dark:text-blue-400 animate-pulse">|</span>
                    </div>

                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                        A passionate student developer with expertise in Laravel, PHP, Tailwind CSS, and modern frontend
                        technologies. Currently pursuing Software Development with a strong focus on full-stack web
                        applications.
                    </p>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                        <span
                            class="px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm font-medium">
                            Frontend Focused
                        </span>
                        <span
                            class="px-4 py-2 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full text-sm font-medium">
                            Full-Stack Learning
                        </span>
                    </div>
                </div>
                <div class="flex-1 flex justify-center lg:justify-end">
                    <img src="{{ asset('img/frontend-focus.svg') }}" alt="Frontend Focus"
                        class="w-96 h-96 object-contain drop-shadow-xl bg-transparent animate-bounce-slow"
                        style="background: none;">
                </div>
            </section>
        </div>

        {{-- <div class="relative mx-auto max-w-7xl px-6 lg:px-8 flex flex-col lg:flex-row items-center">
            <div class="relative mx-auto max-w-2xl lg:mx-0 lg:w-2/3">
                <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">Portfolio site van
                    Ferenc Nimród Lobozár</h2>
                <p class="mt-8 text-pretty text-lg font-medium text-gray-300 sm:text-xl/8">Mijn doel is...</p>
                <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                    <div
                        class="grid grid-cols-1 gap-x-8 gap-y-6 text-base/7 font-semibold text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                        <a href="#">Open roles <span aria-hidden="true">&rarr;</span></a>
                        <a href="#">Internship program <span aria-hidden="true">&rarr;</span></a>
                        <a href="#">Our values <span aria-hidden="true">&rarr;</span></a>
                        <a href="#">Meet our leadership <span aria-hidden="true">&rarr;</span></a>
                    </div>
                    <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="flex flex-col-reverse gap-1">
                            <dt class="text-base/7 text-gray-300">Offices worldwide</dt>
                            <dd class="text-4xl font-semibold tracking-tight text-white">12</dd>
                        </div>
                        <div class="flex flex-col-reverse gap-1">
                            <dt class="text-base/7 text-gray-300">Full-time colleagues</dt>
                            <dd class="text-4xl font-semibold tracking-tight text-white">300+</dd>
                        </div>
                        <div class="flex flex-col-reverse gap-1">
                            <dt class="text-base/7 text-gray-300">Hours per week</dt>
                            <dd class="text-4xl font-semibold tracking-tight text-white">40</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div> --}}
        <div id="about" class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center">
                <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-28">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:w-2/3">
                        <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Over
                            mij</h2>
                        <p class="mt-2 text-lg/8 text-gray-600">Ik ben in <strong>2006</strong> in
                            <strong>Hongarije</strong> geboren, na mijn tiende zijn we naar nederland verhuizd, sinds
                            dien leef ik hier. In de vakanties ga bijna elke keer naar Hongarije toe om familie te
                            ontmoeten. In 2023 heb ik mijn middelbare afgerond op <strong>mavo</strong> niveau in Soest
                            op het <strong class="text-green-500"><a href="https://griftland.nl/"
                                    target="_blank">Griftland College</a></strong>. Daarna ben ik op <strong
                                class="text-blue-500"><a href="https://www.mboutrecht.nl/academies/ict-academie/"
                                    target="_blank">MBO Utrecht ICT Academie</a></strong> gaan studeren voor <strong><a
                                    href="https://www.mboutrecht.nl/opleidingen/software-developer/"
                                    target="_blank">Software developper niveau 4</a></strong>.
                        </p>
                    </div>
                    <div class="lg:w-1/3 flex justify-center lg:justify-end">
                        <img src="{{ asset('img/20240807_185820.jpg') }}" alt="Your Name"
                            class="w-3/4 lg:w-full scale-110 object-cover shadow-[10px_10px_20px_rgba(0,0,0,0.5)]">
                    </div>
                </div>
                <div
                    class="mx-auto mt-10 max-w-2xl border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none">
                    <div class="flex flex-col">
                        <h3 class="text-2xl font-semibold text-gray-900">Skills</h3>
                    </div>
                    <div class="bg-white">
                        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                            <div
                                class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                <div
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] hover-box shadow-[1px_1px_5px_rgba(0,0,0,0.5)]">
                                    <img src="{{ asset('img/html-5-logo.svg') }}" alt="HTML 5" class="scale-90">
                                    <p class="text-center mt-2 font-semibold text-gray-900">HTML 5</p>
                                </div>
                                <div
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] hover-box shadow-[1px_1px_5px_rgba(0,0,0,0.5)]">
                                    <img src="{{ asset('img/css-3-logo.svg') }}" alt="CSS 3">
                                    <p class="text-center mt-2 font-semibold text-gray-900">CSS 3</p>
                                </div>
                                <div
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] hover-box shadow-[1px_1px_5px_rgba(0,0,0,0.5)]">
                                    <img src="{{ asset('img/php-svgrepo-com.svg') }}" alt="PHP">
                                    <p class="text-center mt-2 font-semibold text-gray-900">PHP</p>
                                </div>
                                <div
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] hover-box shadow-[1px_1px_5px_rgba(0,0,0,0.5)]">
                                    <img src="{{ asset('img/laravel.svg.png') }}" alt="Laravel" class="scale-90">
                                    <p class="text-center mt-2 font-semibold text-gray-900">Laravel</p>
                                </div>
                                <div
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] hover-box shadow-[1px_1px_5px_rgba(0,0,0,0.5)]">
                                    <img src="{{ asset('img/git-logo.svg') }}" alt="Git" class="scale-75">
                                    <p class="text-center mt-2 font-semibold text-gray-900">Git</p>
                                </div>
                                <div
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] hover-box shadow-[1px_1px_5px_rgba(0,0,0,0.5)]">
                                    <img src="{{ asset('img/js-logo.svg') }}" alt="JavaScript" class="scale-75">
                                    <p class="text-center mt-2 font-semibold text-gray-900">JavaScript</p>
                                </div>
                                <div
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] hover-box shadow-[1px_1px_5px_rgba(0,0,0,0.5)]">
                                    <img src="{{ asset('img/Blade.png') }}" alt="Blade" class="scale-90">
                                    <p class="text-center mt-2 font-semibold text-gray-900">Blade</p>
                                </div>
                                <div
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] hover-box shadow-[1px_1px_5px_rgba(0,0,0,0.5)]">
                                    <img src="{{ asset('img/mysql-logo.svg') }}" alt="MySQL" class="scale-75">
                                    <p class="text-center mt-2 font-semibold text-gray-900">MySQL</p>
                                </div>
                                <div
                                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] hover-box shadow-[1px_1px_5px_rgba(0,0,0,0.5)]">
                                    <img src="{{ asset('img/mark.svg') }}" alt="MySQL" class="scale-75">
                                    <p class="text-center mt-2 font-semibold text-gray-900">Tailwind</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- test --}}
            <main class="min-h-screen mt-8 px-6 py-12 lg:px-8">


                <!-- Individual Skills Progress Section -->
                <section class="max-w-6xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold text-center mb-12">Skills Breakdown</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="skillsGrid">
                        <!-- HTML -->
                        <div
                            class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-orange-200 dark:border-orange-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-orange-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/html-1.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-orange-700 dark:text-orange-300">HTML</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#fed7aa" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#f97316" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="90"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-orange-700 dark:text-orange-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-orange-600 dark:text-orange-400 text-center mt-4">Semantic markup &
                                structure
                            </p>
                        </div>

                        <!-- CSS -->
                        <div
                            class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-blue-200 dark:border-blue-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-blue-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/css-3.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-blue-700 dark:text-blue-300">CSS</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#93c5fd" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#3b82f6" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="85"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-blue-700 dark:text-blue-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-blue-600 dark:text-blue-400 text-center mt-4">Responsive design &
                                animations
                            </p>
                        </div>

                        <!-- PHP -->
                        <div
                            class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-200 dark:border-purple-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-purple-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/php-4.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-purple-700 dark:text-purple-300">PHP</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#c4b5fd" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#8b5cf6" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="80"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-purple-700 dark:text-purple-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-purple-600 dark:text-purple-400 text-center mt-4">Server-side
                                development
                            </p>
                        </div>

                        <!-- Laravel -->
                        <div
                            class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-red-200 dark:border-red-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-red-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/laravel-2.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-red-700 dark:text-red-300">Laravel</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#fca5a5" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#ef4444" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="75"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-red-700 dark:text-red-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-red-600 dark:text-red-400 text-center mt-4">MVC framework & APIs</p>
                        </div>

                        <!-- JavaScript -->
                        <div
                            class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900/20 dark:to-yellow-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-yellow-200 dark:border-yellow-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-yellow-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/javascript-1.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-yellow-700 dark:text-yellow-300">JavaScript</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#fde047" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#eab308" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="70"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-yellow-700 dark:text-yellow-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-yellow-600 dark:text-yellow-400 text-center mt-4">Interactive web
                                applications</p>
                        </div>

                        <!-- MySQL -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-green-200 dark:border-green-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-green-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/mysql-logo-pure.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-green-700 dark:text-green-300">MySQL</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#86efac" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#22c55e" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="75"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-green-700 dark:text-green-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-green-600 dark:text-green-400 text-center mt-4">Database design &
                                queries
                            </p>
                        </div>

                        <!-- React -->
                        <div
                            class="bg-gradient-to-br from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-cyan-200 dark:border-cyan-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-cyan-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/react-2.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-cyan-700 dark:text-cyan-300">React</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#67e8f9" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#06b6d4" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="60"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-cyan-700 dark:text-cyan-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-cyan-600 dark:text-cyan-400 text-center mt-4">Component-based
                                development
                            </p>
                        </div>

                        <!-- Power BI -->
                        <div
                            class="bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-indigo-200 dark:border-indigo-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-indigo-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/New_Power_BI_Logo.png') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-indigo-700 dark:text-indigo-300">Power BI</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#a5b4fc" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#6366f1" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="65"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-indigo-700 dark:text-indigo-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-indigo-600 dark:text-indigo-400 text-center mt-4">Data visualization
                                &
                                analytics</p>
                        </div>

                        <!-- Chart.js -->
                        <div
                            class="bg-gradient-to-br from-teal-50 to-teal-100 dark:from-teal-900/20 dark:to-teal-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-teal-200 dark:border-teal-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-teal-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/chart_js_favicon.ico') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-teal-700 dark:text-teal-300">Chart.js</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#5eead4" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#14b8a6" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="70"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-teal-700 dark:text-teal-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-teal-600 dark:text-teal-400 text-center mt-4">Interactive data
                                visualization
                            </p>
                        </div>

                        <!-- Git -->
                        <div
                            class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900/20 dark:to-slate-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-slate-200 dark:border-slate-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-slate-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/github-icon-1.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-700 dark:text-slate-300">Git</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#cbd5e1" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#64748b" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="80"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-slate-700 dark:text-slate-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-slate-600 dark:text-slate-400 text-center mt-4">Version control
                                system</p>
                        </div>

                        <!-- Blade -->
                        <div
                            class="bg-gradient-to-br from-rose-50 to-rose-100 dark:from-rose-900/20 dark:to-rose-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-rose-200 dark:border-rose-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-rose-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/blade-ui-kit.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-rose-700 dark:text-rose-300">Blade</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#fda4af" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#f43f5e" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="85"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-rose-700 dark:text-rose-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-rose-600 dark:text-rose-400 text-center mt-4">Laravel templating
                                engine</p>
                        </div>

                        <!-- Docker -->
                        <div
                            class="bg-gradient-to-br from-sky-50 to-sky-100 dark:from-sky-900/20 dark:to-sky-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-sky-200 dark:border-sky-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-sky-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/docker.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-sky-700 dark:text-sky-300">Docker</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#7dd3fc" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#0ea5e9" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="55"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-sky-700 dark:text-sky-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-sky-600 dark:text-sky-400 text-center mt-4">Containerization
                                platform</p>
                        </div>

                        <!-- jQuery -->
                        <div
                            class="bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-amber-200 dark:border-amber-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-amber-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/jquery-4.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-amber-700 dark:text-amber-300">jQuery</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#fcd34d" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#f59e0b" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="75"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-amber-700 dark:text-amber-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-amber-600 dark:text-amber-400 text-center mt-4">JavaScript library
                            </p>
                        </div>

                        <!-- Tailwind CSS -->
                        <div
                            class="bg-gradient-to-br from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-cyan-200 dark:border-cyan-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-cyan-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/tailwind-css-2.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-cyan-700 dark:text-cyan-300">Tailwind</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#67e8f9" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#06b6d4" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="90"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-cyan-700 dark:text-cyan-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-cyan-600 dark:text-cyan-400 text-center mt-4">Utility-first CSS
                                framework
                            </p>
                        </div>

                        <!-- Vite.js -->
                        <div
                            class="bg-gradient-to-br from-violet-50 to-violet-100 dark:from-violet-900/20 dark:to-violet-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-violet-200 dark:border-violet-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-violet-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/vitejs.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-violet-700 dark:text-violet-300">Vite.js</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#c4b5fd" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#8b5cf6" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="75"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-violet-700 dark:text-violet-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-violet-600 dark:text-violet-400 text-center mt-4">Build tool & dev
                                server
                            </p>
                        </div>

                        <!-- Vue.js -->
                        <div
                            class="bg-gradient-to-br from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-emerald-200 dark:border-emerald-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-emerald-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/vue-9.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-emerald-700 dark:text-emerald-300">Vue.js</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#6ee7b7" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#10b981" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="65"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-emerald-700 dark:text-emerald-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-emerald-600 dark:text-emerald-400 text-center mt-4">Progressive
                                JavaScript
                                framework</p>
                        </div>

                        <!-- WordPress -->
                        <div
                            class="bg-gradient-to-br from-stone-50 to-stone-100 dark:from-stone-900/20 dark:to-stone-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-stone-200 dark:border-stone-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-stone-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/wordpress-icon-1.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-stone-700 dark:text-stone-300">WordPress</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#d6d3d1" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#78716c" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="70"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-stone-700 dark:text-stone-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-stone-600 dark:text-stone-400 text-center mt-4">Content management
                                system
                            </p>
                        </div>

                        <!-- Facebook -->
                        <div
                            class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-blue-200 dark:border-blue-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-blue-600 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/facebook-3-2.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-blue-700 dark:text-blue-300">Facebook</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#93c5fd" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#2563eb" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="85"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-blue-700 dark:text-blue-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-blue-600 dark:text-blue-400 text-center mt-4">Social media platform
                            </p>
                        </div>

                        <!-- Instagram -->
                        <div
                            class="bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-pink-200 dark:border-pink-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-pink-500 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/instagram-2016-5.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-pink-700 dark:text-pink-300">Instagram</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#f9a8d4" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#ec4899" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="90"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-pink-700 dark:text-pink-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-pink-600 dark:text-pink-400 text-center mt-4">Photo sharing platform
                            </p>
                        </div>

                        <!-- LinkedIn -->
                        <div
                            class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-blue-200 dark:border-blue-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-blue-700 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/linkedin-icon-2.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-blue-700 dark:text-blue-300">LinkedIn</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#93c5fd" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#1d4ed8" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="85"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-blue-700 dark:text-blue-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-blue-600 dark:text-blue-400 text-center mt-4">Professional
                                networking</p>
                        </div>

                        <!-- Gmail -->
                        <div
                            class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-red-200 dark:border-red-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/official-gmail-icon-2020-.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-red-700 dark:text-red-300">Gmail</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#fca5a5" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#dc2626" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="95"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-red-700 dark:text-red-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-red-600 dark:text-red-400 text-center mt-4">Email service</p>
                        </div>

                        <!-- Threads -->
                        <div
                            class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900/20 dark:to-gray-800/20 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-gray-700 skill-card group hover:scale-105">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="bg-gray-600 text-white p-2 rounded-lg">
                                    <span class="text-xl"><img src="{{ asset('img/threads-1.svg') }}"
                                            alt=""></span>
                                </div>
                                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300">Threads</h3>
                            </div>
                            <div class="relative w-20 h-20 mx-auto">
                                <svg class="w-20 h-20 transform -rotate-90" viewBox="0 0 36 36">
                                    <path stroke="#d1d5db" stroke-width="3" fill="none"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="progress-path" stroke="#4b5563" stroke-width="3" fill="none"
                                        stroke-linecap="round" stroke-dasharray="0, 100" data-target="80"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="text-lg font-bold text-gray-700 dark:text-gray-300 progress-text">0%</span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 text-center mt-4">Text-based social
                                platform</p>
                        </div>
                    </div>
                </section>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const skillsGrid = document.getElementById('skillsGrid');
                        let animationsTriggered = false;

                        function animateProgress(card) {
                            const progressPath = card.querySelector('.progress-path');
                            const progressText = card.querySelector('.progress-text');
                            const target = parseInt(progressPath.getAttribute('data-target'));

                            let currentProgress = 0;
                            const duration = 2000; // 2 seconds
                            const steps = 60;
                            const increment = target / steps;
                            const stepTime = duration / steps;

                            const timer = setInterval(() => {
                                currentProgress += increment;

                                if (currentProgress >= target) {
                                    currentProgress = target;
                                    clearInterval(timer);
                                }

                                // Update stroke-dasharray for circular progress
                                progressPath.style.strokeDasharray = `${currentProgress}, 100`;

                                // Update text
                                progressText.textContent = Math.round(currentProgress) + '%';
                            }, stepTime);
                        }

                        function checkInView() {
                            if (animationsTriggered) return;

                            const rect = skillsGrid.getBoundingClientRect();
                            const windowHeight = window.innerHeight || document.documentElement.clientHeight;

                            // Trigger when element is 20% visible
                            if (rect.top <= windowHeight * 0.8 && rect.bottom >= 0) {
                                animationsTriggered = true;

                                // Animate each skill card with a staggered delay
                                const skillCards = document.querySelectorAll('.skill-card');
                                skillCards.forEach((card, index) => {
                                    setTimeout(() => {
                                        animateProgress(card);
                                    }, index * 150); // 150ms delay between each card
                                });
                            }
                        }

                        // Check on scroll
                        window.addEventListener('scroll', checkInView);

                        // Check on load in case already in view
                        checkInView();
                    });
                </script>

                <!-- Concepts Section -->
                <section class="max-w-4xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold text-center mb-12">Development Concepts</h2>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div
                            class="bg-gray-50 dark:bg-gray-800 p-8 rounded-lg border border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">CRUD Operations
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400">
                                <span class="font-medium">Create, Read, Update, Delete</span> - Essential database
                                operations
                                for building dynamic web applications.
                            </p>
                        </div>
                        <div
                            class="bg-gray-50 dark:bg-gray-800 p-8 rounded-lg border border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">MVC Architecture
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400">
                                <span class="font-medium">Model, View, Controller</span> - Design pattern for
                                organizing code
                                and separating concerns in web applications.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- About Section -->
                <section class="max-w-4xl mx-auto text-center">
                    <div
                        class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 p-8 rounded-lg border border-blue-200 dark:border-blue-800">
                        <h2 class="text-3xl font-bold mb-6">About Me</h2>
                        <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                            I'm a passionate Software Development student with a strong focus on frontend technologies.
                            I enjoy creating beautiful, responsive user interfaces and bringing designs to life with
                            modern web
                            technologies.
                            Currently expanding my full-stack knowledge while specializing in frontend development.
                        </p>
                    </div>
                </section>
            </main>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('skillsChart').getContext('2d');

                const skillsChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['HTML', 'CSS', 'PHP', 'Laravel', 'JavaScript', 'MySQL', 'React', 'Power BI'],
                        datasets: [{
                            label: 'Proficiency Level (%)',
                            data: [90, 85, 80, 75, 70, 75, 60, 65],
                            backgroundColor: [
                                'rgba(255, 159, 64, 0.7)', // Orange for HTML
                                'rgba(54, 162, 235, 0.7)', // Blue for CSS
                                'rgba(153, 102, 255, 0.7)', // Purple for PHP
                                'rgba(255, 99, 132, 0.7)', // Red for Laravel
                                'rgba(255, 205, 86, 0.7)', // Yellow for JavaScript
                                'rgba(75, 192, 192, 0.7)', // Green for MySQL
                                'rgba(54, 162, 235, 0.7)', // Cyan for React
                                'rgba(153, 102, 255, 0.7)' // Indigo for Power BI
                            ],
                            borderColor: [
                                'rgb(255, 159, 64)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100,
                                ticks: {
                                    callback: function(value) {
                                        return value + '%';
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.parsed.y + '%';
                                    }
                                }
                            }
                        }
                    }
                });

                // Update chart colors based on theme changes
                window.addEventListener('theme-changed', function(e) {
                    if (typeof skillsChart !== 'undefined') {
                        const isDark = e.detail.theme === 'dark';
                        skillsChart.options.scales.x.ticks.color = isDark ? '#e5e7eb' : '#374151';
                        skillsChart.options.scales.y.ticks.color = isDark ? '#e5e7eb' : '#374151';
                        skillsChart.options.scales.x.grid.color = isDark ? '#374151' : '#e5e7eb';
                        skillsChart.options.scales.y.grid.color = isDark ? '#374151' : '#e5e7eb';
                        skillsChart.update();
                    }
                });
            </script>
            {{-- test end --}}
            <div id="projects" class="bg-gray-100 py-24 sm:py-32">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Projecten leerjaar
                            1
                        </h2>
                        <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:</p>
                    </div>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($projects->where('year', '1') as $project)
                            <a href="{{ route('projects.show', $project->id) }}"
                                class="project bg-white p-6 rounded-lg shadow-lg">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $project->title }}</h3>
                                <p class="mt-2 text-gray-600">{{ $project->description }}</p>
                            </a>
                        @endforeach
                    </div>
                    <br>
                    <div class="mx-auto max-w-2xl lg:mx-0 border-t border-gray-300 pt-5">
                        <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Projecten leerjaar
                            2
                        </h2>
                        <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:</p>
                    </div>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($projects->where('year', '2') as $project)
                            <a href="{{ route('projects.show', $project->id) }}"
                                class="project bg-white p-6 rounded-lg shadow-lg">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $project->title }}</h3>
                                <p class="mt-2 text-gray-600">{{ $project->description }}</p>
                            </a>
                        @endforeach
                    </div>
                    <br>
                    <div class="mx-auto max-w-2xl lg:mx-0 border-t border-gray-300 pt-5">
                        <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Eigen projecten
                        </h2>
                        <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:</p>
                    </div>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($projects->where('year', 'Eigen project') as $project)
                            <a href="{{ route('projects.show', $project->id) }}"
                                class="project bg-white p-6 rounded-lg shadow-lg">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $project->title }}</h3>
                                <p class="mt-2 text-gray-600">{{ $project->description }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="projects" class="bg-gray-100 py-24 sm:py-32">
                <div class="mx-64 max-w-full px-6 lg:px-8">
                    <iframe class="w-full h-screen border-4 border-gray-300"
                        src="{{ asset('ModernKnight/index.html') }}" frameborder="0"></iframe>
                </div>
            </div>

            <div id="contact" class="bg-white py-24 sm:py-32">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Contact</h2>
                        <p class="mt-2 text-lg text-gray-600">Feel free to reach out to me through the following
                            methods:
                        </p>
                    </div>
                    <div class="mt-10">
                        <form action="#" method="POST"
                            class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <div class="mt-1">
                                    <input type="text" name="name" id="name" autocomplete="name"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1">
                                    <input type="email" name="email" id="email" autocomplete="email"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                <div class="mt-1">
                                    <textarea id="message" name="message" rows="4"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
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
</body>

</html>
