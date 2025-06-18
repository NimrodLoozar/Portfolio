<!DOCTYPE html>
<html id="theme-toggle" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <div class="bg-white dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <header
            class="fixed inset-x-0 top-0 z-50 bg-gray-900/10 dark:bg-gray-800/20 backdrop-blur-lg shadow-lg transition-colors duration-300">
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
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white">
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#about"
                        class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white transition-colors duration-200">Over
                        mij</a>
                    <a href="#projects"
                        class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white transition-colors duration-200">Pojecten</a>
                    <a href="#contact"
                        class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white transition-colors duration-200">Contact</a>
                    <a href="#"
                        class="text-sm/6 font-semibold text-white dark:text-gray-200 hover:text-gray-300 dark:hover:text-white transition-colors duration-200">Company</a>
                    <!-- Enhanced Theme toggle button -->
                    <button id="theme-toggle" type="button"
                        class="theme-toggle-btn relative inline-flex items-center justify-center w-11 h-6 bg-gray-200 dark:bg-gray-700 rounded-full transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 hover:bg-gray-300 dark:hover:bg-gray-600 group">
                        <span class="sr-only">Toggle theme</span>

                        <!-- Toggle slider -->
                        <span
                            class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full transition-transform duration-300 ease-in-out transform translate-x-0 dark:translate-x-5 shadow-lg">
                            <!-- Sun icon (light mode) -->
                            <svg id="sun-icon"
                                class="absolute inset-0 w-5 h-5 text-yellow-500 transition-all duration-300 dark:opacity-0 dark:scale-75"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <!-- Moon icon (dark mode) -->
                            <svg id="moon-icon"
                                class="absolute inset-0 w-5 h-5 text-blue-400 transition-all duration-300 opacity-0 scale-75 dark:opacity-100 dark:scale-100"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </span>
                    </button>
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
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white dark:bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 dark:sm:ring-gray-100/10">
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
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">Over
                                    mij</a>
                                <a href="#projects"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">Projecten</a>
                                <a href="#contact"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">Contact</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">Company</a>
                                <!-- Enhanced Mobile theme toggle -->
                                <div class="-mx-3 px-3 py-2">
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="text-base/7 font-semibold text-gray-900 dark:text-white">Thema:</span>
                                        <button id="mobile-theme-toggle" type="button"
                                            class="theme-toggle-btn relative inline-flex items-center justify-center w-11 h-6 bg-gray-200 dark:bg-gray-700 rounded-full transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 hover:bg-gray-300 dark:hover:bg-gray-600">
                                            <!-- Toggle slider -->
                                            <span
                                                class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full transition-transform duration-300 ease-in-out transform translate-x-0 dark:translate-x-5 shadow-lg">
                                                <!-- Sun icon (light mode) -->
                                                <svg id="mobile-sun-icon"
                                                    class="absolute inset-0 w-5 h-5 text-yellow-500 transition-all duration-300 dark:opacity-0 dark:scale-75"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <!-- Moon icon (dark mode) -->
                                                <svg id="mobile-moon-icon"
                                                    class="absolute inset-0 w-5 h-5 text-blue-400 transition-all duration-300 opacity-0 scale-75 dark:opacity-100 dark:scale-100"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="py-6">
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">Log
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
            <section
                class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center justify-between mb-16 gap-10 px-4">
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

        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center">
                <div id="about" class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-28">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:w-2/3">
                        <h2
                            class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                            Over
                            mij</h2>
                        <p class="mt-2 text-lg/8 text-gray-600 dark:text-gray-300">Ik ben in <strong>2006</strong> in
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
                        <img id="about-photo" src="{{ asset('img/20240807_185820.jpg') }}" alt="Your Name"
                            class="w-3/4 lg:w-full scale-110 object-cover shadow-[10px_10px_20px_rgba(0,0,0,0.5)] rounded-lg dark:shadow-[10px_10px_20px_rgba(0,0,0,0.8)]"
                            style="opacity:0;">
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var photo = document.getElementById('about-photo');
                            if (!photo) return;
                            var observer = new IntersectionObserver(function(entries) {
                                entries.forEach(function(entry) {
                                    if (entry.isIntersecting) {
                                        photo.classList.add('animate__animated', 'animate__fadeInBottomRight');
                                        photo.style.opacity = 1;
                                        observer.disconnect();
                                    }
                                });
                            }, {
                                threshold: 0.5
                            });
                            observer.observe(photo);
                        });
                    </script>
                </div>

                <div class="w-full flex flex-col gap-8 mt-16 lg:mt-24 mb-8">
                    <!-- Section Buttons -->
                    <div class="w-full flex justify-center gap-4 mb-8">
                        <button id="btn-languages"
                            class="section-btn px-6 py-2 rounded-lg font-semibold bg-blue-600 text-white shadow hover:bg-blue-700 transition"
                            data-section="languages">Programming Languages</button>
                        <button id="btn-libraries"
                            class="section-btn px-6 py-2 rounded-lg font-semibold bg-purple-600 text-white shadow hover:bg-purple-700 transition"
                            data-section="libraries">Libraries / Version Control</button>
                        <button id="btn-social"
                            class="section-btn px-6 py-2 rounded-lg font-semibold bg-pink-600 text-white shadow hover:bg-pink-700 transition"
                            data-section="social">Social Media</button>
                    </div>

                    <!-- Section Contents (Skills Breakdown) -->
                    <x-skills-breakdown />

                    <div id="projects" class="bg-gray-100 dark:bg-gray-900 py-24 sm:py-32">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <div class="mx-auto max-w-2xl lg:mx-0">
                                <h2
                                    class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                                    Projecten
                                    leerjaar
                                    1
                                </h2>
                                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Here are some of the projects
                                    I have worked on:
                                </p>
                            </div>
                            <div
                                class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                @foreach ($projects->where('year', '1') as $project)
                                    <a href="{{ route('projects.show', $project->id) }}"
                                        class="project bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $project->title }}</h3>
                                        <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $project->description }}
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                            <br>
                            <div class="mx-auto max-w-2xl lg:mx-0 border-t border-gray-300 dark:border-gray-700 pt-5">
                                <h2
                                    class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                                    Projecten
                                    leerjaar
                                    2
                                </h2>
                                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Here are some of the projects
                                    I have worked on:
                                </p>
                            </div>
                            <div
                                class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                @foreach ($projects->where('year', '2') as $project)
                                    <a href="{{ route('projects.show', $project->id) }}"
                                        class="project bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $project->title }}</h3>
                                        <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $project->description }}
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                            <br>
                            <div class="mx-auto max-w-2xl lg:mx-0 border-t border-gray-300 dark:border-gray-700 pt-5">
                                <h2
                                    class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                                    Eigen
                                    projecten
                                </h2>
                                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Here are some of the projects
                                    I have worked on:
                                </p>
                            </div>
                            <div
                                class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                @foreach ($projects->where('year', 'Eigen project') as $project)
                                    <a href="{{ route('projects.show', $project->id) }}"
                                        class="project bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $project->title }}</h3>
                                        <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $project->description }}
                                        </p>
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
                                <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Contact
                                </h2>
                                <p class="mt-2 text-lg text-gray-600">Feel free to reach out to me through the
                                    following
                                    methods:
                                </p>
                            </div>
                            <div class="mt-10">
                                <form action="#" method="POST"
                                    class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                    <div>
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700">Name</label>
                                        <div class="mt-1">
                                            <input type="text" name="name" id="name" autocomplete="name"
                                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="email"
                                            class="block text-sm font-medium text-gray-700">Email</label>
                                        <div class="mt-1">
                                            <input type="email" name="email" id="email" autocomplete="email"
                                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="message"
                                            class="block text-sm font-medium text-gray-700">Message</label>
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
                </div>
            </div>
        </div>
        <footer class="bg-gray-900 text-white py-8">
            <div class="container mx-auto text-center">
                <p class="text-sm">© {{ date('Y') }} F.Nimród Lobozár. All rights reserved.</p>
                <p class="text-xs mt-2">Made with <span class="text-red-500">&hearts;</span> using Laravel, PHP, and
                    Tailwind CSS.</p>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var grids = document.querySelectorAll('#skills-grid');
            grids.forEach(function(grid) {
                if (!grid) return;
                var animated = false;
                var observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting && !animated) {
                            grid.classList.add('animate__animated', 'animate__fadeInLeft');
                            animated = true;
                            observer.disconnect();
                        }
                    });
                }, {
                    threshold: 0.3
                });
                observer.observe(grid);
            });
        });
    </script>

    <!-- Fallback theme toggle script -->
    <script>
        // Immediate theme toggle fallback
        document.addEventListener('DOMContentLoaded', function() {
            console.log('=== FALLBACK THEME TOGGLE SCRIPT LOADED ===');

            // Send fallback init log to Laravel
            fetch('/log-theme-event', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({
                    event: 'fallback_init',
                    message: 'Fallback theme toggle script loaded',
                    timestamp: new Date().toISOString()
                })
            }).catch(e => console.log('Failed to log fallback init to Laravel:', e));

            function setupThemeToggle() {
                console.log('=== SETTING UP FALLBACK THEME TOGGLE ===');
                const themeToggle = document.getElementById('theme-toggle');
                console.log('Fallback: Theme toggle button found:', !!themeToggle);

                if (themeToggle) {
                    console.log('Fallback: Adding event listener to theme toggle');

                    // Send button found log
                    fetch('/log-theme-event', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                        },
                        body: JSON.stringify({
                            event: 'fallback_button_found',
                            message: 'Fallback: Theme toggle button found and listener added',
                            timestamp: new Date().toISOString()
                        })
                    }).catch(e => console.log('Failed to log button found to Laravel:', e));

                    themeToggle.addEventListener('click', function(e) {
                        console.log('=== FALLBACK: THEME TOGGLE CLICKED ===');
                        e.preventDefault();

                        // Send click log to Laravel
                        fetch('/log-theme-event', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    ?.content || ''
                            },
                            body: JSON.stringify({
                                event: 'fallback_button_clicked',
                                message: 'Fallback: Theme toggle button clicked',
                                timestamp: new Date().toISOString()
                            })
                        }).catch(e => console.log('Failed to log fallback click to Laravel:', e));

                        const isDark = document.documentElement.classList.contains('dark');
                        console.log('Fallback: Current state is dark:', isDark);
                        console.log('Fallback: Current document classes:', document.documentElement
                            .classList.toString());

                        if (isDark) {
                            console.log('Fallback: Switching to light mode...');
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('theme', 'light');
                            console.log('Fallback: Switched to light mode');

                            // Log to Laravel
                            fetch('/log-theme-event', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')?.content || ''
                                },
                                body: JSON.stringify({
                                    event: 'fallback_theme_switch',
                                    message: 'Fallback: Switched to light mode',
                                    data: {
                                        theme: 'light'
                                    },
                                    timestamp: new Date().toISOString()
                                })
                            }).catch(e => console.log('Failed to log theme switch to Laravel:', e));
                        } else {
                            console.log('Fallback: Switching to dark mode...');
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('theme', 'dark');
                            console.log('Fallback: Switched to dark mode');

                            // Log to Laravel
                            fetch('/log-theme-event', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')?.content || ''
                                },
                                body: JSON.stringify({
                                    event: 'fallback_theme_switch',
                                    message: 'Fallback: Switched to dark mode',
                                    data: {
                                        theme: 'dark'
                                    },
                                    timestamp: new Date().toISOString()
                                })
                            }).catch(e => console.log('Failed to log theme switch to Laravel:', e));
                        }

                        // Update icons
                        const sunIcon = document.getElementById('sun-icon');
                        const moonIcon = document.getElementById('moon-icon');

                        console.log('Fallback: Sun icon found:', !!sunIcon);
                        console.log('Fallback: Moon icon found:', !!moonIcon);

                        if (sunIcon && moonIcon) {
                            if (document.documentElement.classList.contains('dark')) {
                                sunIcon.classList.add('hidden');
                                moonIcon.classList.remove('hidden');
                                console.log('Fallback: Icons updated for dark mode');
                            } else {
                                sunIcon.classList.remove('hidden');
                                moonIcon.classList.add('hidden');
                                console.log('Fallback: Icons updated for light mode');
                            }

                            console.log('Fallback: Sun icon classes:', sunIcon.classList.toString());
                            console.log('Fallback: Moon icon classes:', moonIcon.classList.toString());
                        } else {
                            console.log('Fallback: Icons not found!');
                        }

                        console.log('Fallback: Final document classes:', document.documentElement.classList
                            .toString());
                    });
                } else {
                    console.log('Fallback: Theme toggle button NOT found!');

                    // Log button not found
                    fetch('/log-theme-event', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                        },
                        body: JSON.stringify({
                            event: 'fallback_button_not_found',
                            message: 'Fallback: Theme toggle button NOT found',
                            timestamp: new Date().toISOString()
                        })
                    }).catch(e => console.log('Failed to log button not found to Laravel:', e));
                }
            }

            // Try immediately and after a delay
            setupThemeToggle();
            setTimeout(setupThemeToggle, 1000);
        });
    </script>
</body>

</html>
