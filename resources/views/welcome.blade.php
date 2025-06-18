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

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="bg-white dark:bg-gray-900 min-h-screen">
        <header class="fixed inset-x-0 top-0 z-50 bg-gray-900/10 backdrop-blur-lg shadow-lg">
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
                    <style>
                        .section-btn.active {
                            filter: brightness(1.15);
                            /* visually highlight */
                            outline: none;
                        }
                    </style>
                    <!-- Section Contents (Skills Breakdown) -->
                    <x-skills-breakdown />

                    <div id="projects" class="bg-gray-100 py-24 sm:py-32">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <div class="mx-auto max-w-2xl lg:mx-0">
                                <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Projecten
                                    leerjaar
                                    1
                                </h2>
                                <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:
                                </p>
                            </div>
                            <div
                                class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
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
                                <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Projecten
                                    leerjaar
                                    2
                                </h2>
                                <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:
                                </p>
                            </div>
                            <div
                                class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
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
                                <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Eigen
                                    projecten
                                </h2>
                                <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:
                                </p>
                            </div>
                            <div
                                class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
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
</body>

</html>
