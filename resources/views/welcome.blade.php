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
        <div id="about" class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center">
                <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-28">
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
                    <div class="w-full">
                        <!-- Programming Languages Section -->
                        <div id="section-languages"
                            class="section-content fade-section flex-1 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 border border-blue-200 dark:border-blue-700 rounded-xl p-6 shadow-lg">
                            <h3 class="text-2xl font-bold mb-8 text-blue-700 dark:text-blue-300 text-center">
                                Programming Languages</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 skillsGrid"
                                data-skill-group="languages" id="skills-grid">
                                @php
                                    $skills_languages = [
                                        [
                                            'name' => 'HTML',
                                            'icon' => 'img/html-1.svg',
                                            'color' => 'orange',
                                            'bg' =>
                                                'from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20',
                                            'border' => 'border-orange-200 dark:border-orange-700',
                                            'stroke' => ['#fed7aa', '#f97316'],
                                            'target' => 90,
                                            'desc' => 'Semantic markup & structure',
                                        ],
                                        [
                                            'name' => 'CSS',
                                            'icon' => 'img/css-3.svg',
                                            'color' => 'blue',
                                            'bg' =>
                                                'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20',
                                            'border' => 'border-blue-200 dark:border-blue-700',
                                            'stroke' => ['#93c5fd', '#3b82f6'],
                                            'target' => 85,
                                            'desc' => 'Responsive design & animations',
                                        ],
                                        [
                                            'name' => 'JavaScript',
                                            'icon' => 'img/javascript-1.svg',
                                            'color' => 'yellow',
                                            'bg' =>
                                                'from-yellow-50 to-yellow-100 dark:from-yellow-900/20 dark:to-yellow-800/20',
                                            'border' => 'border-yellow-200 dark:border-yellow-700',
                                            'stroke' => ['#fde047', '#eab308'],
                                            'target' => 70,
                                            'desc' => 'Interactive web applications',
                                        ],
                                        [
                                            'name' => 'PHP',
                                            'icon' => 'img/php-4.svg',
                                            'color' => 'purple',
                                            'bg' =>
                                                'from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20',
                                            'border' => 'border-purple-200 dark:border-purple-700',
                                            'stroke' => ['#c4b5fd', '#8b5cf6'],
                                            'target' => 80,
                                            'desc' => 'Server-side development',
                                        ],
                                        [
                                            'name' => 'MYSQL',
                                            'icon' => 'img/mysql-logo-pure.svg',
                                            'color' => 'blue',
                                            'bg' =>
                                                'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20',
                                            'border' => 'border-blue-200 dark:border-blue-700',
                                            'stroke' => ['#93c5fd', '#2563eb'],
                                            'target' => 75,
                                            'desc' => 'Database management',
                                        ],
                                    ];
                                @endphp
                                @foreach ($skills_languages as $skill)
                                    <div
                                        class="flex flex-col items-center justify-between bg-gradient-to-br {{ $skill['bg'] }} p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 {{ $skill['border'] }} skill-card group hover:scale-105 min-h-[240px]">
                                        <div class="flex flex-col items-center w-full">
                                            <div class="flex items-center justify-center mb-2 w-16 h-16">
                                                <img src="{{ asset($skill['icon']) }}" alt="{{ $skill['name'] }}"
                                                    class="w-12 h-12 object-contain" />
                                            </div>
                                            <div class="relative w-16 h-16 mb-2">
                                                <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 36 36">
                                                    <path stroke="{{ $skill['stroke'][0] }}" stroke-width="3"
                                                        fill="none"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    <path class="progress-path" stroke="{{ $skill['stroke'][1] }}"
                                                        stroke-width="3" fill="none" stroke-linecap="round"
                                                        stroke-dasharray="0, 100"
                                                        data-target="{{ $skill['target'] }}"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                </svg>
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <span
                                                        class="text-base font-bold text-{{ $skill['color'] }}-700 dark:text-{{ $skill['color'] }}-300 progress-text">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h3
                                            class="text-base font-bold text-center text-{{ $skill['color'] }}-700 dark:text-{{ $skill['color'] }}-300 mb-1">
                                            {{ $skill['name'] }}</h3>
                                        <p
                                            class="text-xs text-center text-{{ $skill['color'] }}-600 dark:text-{{ $skill['color'] }}-400">
                                            {{ $skill['desc'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Libraries / Version Control Section -->
                        <div id="section-libraries"
                            class="section-content fade-section hidden flex-1 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 border border-purple-200 dark:border-purple-700 rounded-xl p-6 shadow-lg">
                            <h3 class="text-2xl font-bold mb-8 text-purple-700 dark:text-purple-300 text-center">
                                Libraries / Version Control</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 skillsGrid"
                                data-skill-group="libraries" id="skills-grid">
                                @php
                                    $skills_libraries = [
                                        [
                                            'name' => 'Laravel',
                                            'icon' => 'img/laravel-2.svg',
                                            'color' => 'red',
                                            'bg' => 'from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20',
                                            'border' => 'border-red-200 dark:border-red-700',
                                            'stroke' => ['#fca5a5', '#ef4444'],
                                            'target' => 75,
                                            'desc' => 'MVC framework & APIs',
                                        ],
                                        [
                                            'name' => 'React',
                                            'icon' => 'img/react-2.svg',
                                            'color' => 'cyan',
                                            'bg' =>
                                                'from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20',
                                            'border' => 'border-cyan-200 dark:border-cyan-700',
                                            'stroke' => ['#67e8f9', '#06b6d4'],
                                            'target' => 60,
                                            'desc' => 'Component-based development',
                                        ],
                                        [
                                            'name' => 'Vue.js',
                                            'icon' => 'img/vue-9.svg',
                                            'color' => 'emerald',
                                            'bg' =>
                                                'from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20',
                                            'border' => 'border-emerald-200 dark:border-emerald-700',
                                            'stroke' => ['#6ee7b7', '#10b981'],
                                            'target' => 65,
                                            'desc' => 'Progressive JavaScript framework',
                                        ],
                                        [
                                            'name' => 'Tailwind',
                                            'icon' => 'img/tailwind-css-2.svg',
                                            'color' => 'cyan',
                                            'bg' =>
                                                'from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20',
                                            'border' => 'border-cyan-200 dark:border-cyan-700',
                                            'stroke' => ['#67e8f9', '#06b6d4'],
                                            'target' => 90,
                                            'desc' => 'Utility-first CSS framework',
                                        ],
                                        [
                                            'name' => 'Git',
                                            'icon' => 'img/github-icon-1.svg',
                                            'color' => 'slate',
                                            'bg' =>
                                                'from-slate-50 to-slate-100 dark:from-slate-900/20 dark:to-slate-800/20',
                                            'border' => 'border-slate-200 dark:border-slate-700',
                                            'stroke' => ['#cbd5e1', '#64748b'],
                                            'target' => 80,
                                            'desc' => 'Version control system',
                                        ],
                                        [
                                            'name' => 'Docker',
                                            'icon' => 'img/docker.svg',
                                            'color' => 'sky',
                                            'bg' => 'from-sky-50 to-sky-100 dark:from-sky-900/20 dark:to-sky-800/20',
                                            'border' => 'border-sky-200 dark:border-sky-700',
                                            'stroke' => ['#7dd3fc', '#0ea5e9'],
                                            'target' => 55,
                                            'desc' => 'Containerization platform',
                                        ],
                                        [
                                            'name' => 'jQuery',
                                            'icon' => 'img/jquery-4.svg',
                                            'color' => 'amber',
                                            'bg' =>
                                                'from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20',
                                            'border' => 'border-amber-200 dark:border-amber-700',
                                            'stroke' => ['#fcd34d', '#f59e0b'],
                                            'target' => 75,
                                            'desc' => 'JavaScript library',
                                        ],
                                        [
                                            'name' => 'Vite.js',
                                            'icon' => 'img/vitejs.svg',
                                            'color' => 'violet',
                                            'bg' =>
                                                'from-violet-50 to-violet-100 dark:from-violet-900/20 dark:to-violet-800/20',
                                            'border' => 'border-violet-200 dark:border-violet-700',
                                            'stroke' => ['#c4b5fd', '#8b5cf6'],
                                            'target' => 75,
                                            'desc' => 'Build tool & dev server',
                                        ],
                                        [
                                            'name' => 'Blade',
                                            'icon' => 'img/blade-ui-kit.svg',
                                            'color' => 'rose',
                                            'bg' =>
                                                'from-rose-50 to-rose-100 dark:from-rose-900/20 dark:to-rose-800/20',
                                            'border' => 'border-rose-200 dark:border-rose-700',
                                            'stroke' => ['#fda4af', '#f43f5e'],
                                            'target' => 85,
                                            'desc' => 'Laravel templating engine',
                                        ],
                                        [
                                            'name' => 'WordPress',
                                            'icon' => 'img/wordpress-icon-1.svg',
                                            'color' => 'stone',
                                            'bg' =>
                                                'from-stone-50 to-stone-100 dark:from-stone-900/20 dark:to-stone-800/20',
                                            'border' => 'border-stone-200 dark:border-stone-700',
                                            'stroke' => ['#d6d3d1', '#78716c'],
                                            'target' => 70,
                                            'desc' => 'Content management system',
                                        ],
                                        [
                                            'name' => 'Chart.js',
                                            'icon' => 'img/chart_js_favicon.ico',
                                            'color' => 'teal',
                                            'bg' =>
                                                'from-teal-50 to-teal-100 dark:from-teal-900/20 dark:to-teal-800/20',
                                            'border' => 'border-teal-200 dark:border-teal-700',
                                            'stroke' => ['#5eead4', '#14b8a6'],
                                            'target' => 70,
                                            'desc' => 'Interactive data visualization',
                                        ],
                                    ];
                                @endphp
                                @foreach ($skills_libraries as $skill)
                                    <div
                                        class="flex flex-col items-center justify-between bg-gradient-to-br {{ $skill['bg'] }} p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 {{ $skill['border'] }} skill-card group hover:scale-105 min-h-[240px]">
                                        <div class="flex flex-col items-center w-full">
                                            <div class="flex items-center justify-center mb-2 w-16 h-16">
                                                <img src="{{ asset($skill['icon']) }}" alt="{{ $skill['name'] }}"
                                                    class="w-12 h-12 object-contain" />
                                            </div>
                                            <div class="relative w-16 h-16 mb-2">
                                                <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 36 36">
                                                    <path stroke="{{ $skill['stroke'][0] }}" stroke-width="3"
                                                        fill="none"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    <path class="progress-path" stroke="{{ $skill['stroke'][1] }}"
                                                        stroke-width="3" fill="none" stroke-linecap="round"
                                                        stroke-dasharray="0, 100"
                                                        data-target="{{ $skill['target'] }}"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                </svg>
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <span
                                                        class="text-base font-bold text-{{ $skill['color'] }}-700 dark:text-{{ $skill['color'] }}-300 progress-text">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h3
                                            class="text-base font-bold text-center text-{{ $skill['color'] }}-700 dark:text-{{ $skill['color'] }}-300 mb-1">
                                            {{ $skill['name'] }}</h3>
                                        <p
                                            class="text-xs text-center text-{{ $skill['color'] }}-600 dark:text-{{ $skill['color'] }}-400">
                                            {{ $skill['desc'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Social Media Section -->
                        <div id="section-social"
                            class="section-content fade-section hidden flex-1 bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20 border border-pink-200 dark:border-pink-700 rounded-xl p-6 shadow-lg">
                            <h3 class="text-2xl font-bold mb-8 text-pink-700 dark:text-pink-300 text-center">Social
                                Media</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 skillsGrid"
                                data-skill-group="social" id="skills-grid">
                                @php
                                    $skills_social = [
                                        [
                                            'name' => 'Facebook',
                                            'icon' => 'img/facebook-3-2.svg',
                                            'color' => 'blue',
                                            'bg' =>
                                                'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20',
                                            'border' => 'border-blue-200 dark:border-blue-700',
                                            'stroke' => ['#93c5fd', '#2563eb'],
                                            'target' => 85,
                                            'desc' => 'Social media platform',
                                        ],
                                        [
                                            'name' => 'Instagram',
                                            'icon' => 'img/instagram-2016-5.svg',
                                            'color' => 'pink',
                                            'bg' =>
                                                'from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20',
                                            'border' => 'border-pink-200 dark:border-pink-700',
                                            'stroke' => ['#f9a8d4', '#ec4899'],
                                            'target' => 90,
                                            'desc' => 'Photo sharing platform',
                                        ],
                                        [
                                            'name' => 'LinkedIn',
                                            'icon' => 'img/linkedin-icon-2.svg',
                                            'color' => 'blue',
                                            'bg' =>
                                                'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20',
                                            'border' => 'border-blue-200 dark:border-blue-700',
                                            'stroke' => ['#93c5fd', '#1d4ed8'],
                                            'target' => 85,
                                            'desc' => 'Professional networking',
                                        ],
                                        [
                                            'name' => 'Gmail',
                                            'icon' => 'img/official-gmail-icon-2020-.svg',
                                            'color' => 'red',
                                            'bg' => 'from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20',
                                            'border' => 'border-red-200 dark:border-red-700',
                                            'stroke' => ['#fca5a5', '#dc2626'],
                                            'target' => 95,
                                            'desc' => 'Email service',
                                        ],
                                        [
                                            'name' => 'Threads',
                                            'icon' => 'img/threads-1.svg',
                                            'color' => 'gray',
                                            'bg' =>
                                                'from-gray-50 to-gray-100 dark:from-gray-900/20 dark:to-gray-800/20',
                                            'border' => 'border-gray-200 dark:border-gray-700',
                                            'stroke' => ['#d1d5db', '#4b5563'],
                                            'target' => 80,
                                            'desc' => 'Text-based social platform',
                                        ],
                                    ];
                                @endphp
                                @foreach ($skills_social as $skill)
                                    <div
                                        class="flex flex-col items-center justify-between bg-gradient-to-br {{ $skill['bg'] }} p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 {{ $skill['border'] }} skill-card group hover:scale-105 min-h-[240px]">
                                        <div class="flex flex-col items-center w-full">
                                            <div class="flex items-center justify-center mb-2 w-16 h-16">
                                                <img src="{{ asset($skill['icon']) }}" alt="{{ $skill['name'] }}"
                                                    class="w-12 h-12 object-contain" />
                                            </div>
                                            <div class="relative w-16 h-16 mb-2">
                                                <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 36 36">
                                                    <path stroke="{{ $skill['stroke'][0] }}" stroke-width="3"
                                                        fill="none"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    <path class="progress-path" stroke="{{ $skill['stroke'][1] }}"
                                                        stroke-width="3" fill="none" stroke-linecap="round"
                                                        stroke-dasharray="0, 100"
                                                        data-target="{{ $skill['target'] }}"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                </svg>
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <span
                                                        class="text-base font-bold text-{{ $skill['color'] }}-700 dark:text-{{ $skill['color'] }}-300 progress-text">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h3
                                            class="text-base font-bold text-center text-{{ $skill['color'] }}-700 dark:text-{{ $skill['color'] }}-300 mb-1">
                                            {{ $skill['name'] }}</h3>
                                        <p
                                            class="text-xs text-center text-{{ $skill['color'] }}-600 dark:text-{{ $skill['color'] }}-400">
                                            {{ $skill['desc'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .fade-section {
                        opacity: 1;
                        transition: opacity 0.5s;
                        pointer-events: auto;
                        display: block;
                    }

                    .fade-section.fade-out {
                        opacity: 0;
                        transition: opacity 0.2s;
                        pointer-events: none;
                    }

                    .fade-section.fade-in {
                        opacity: 1;
                        transition: opacity 0.5s;
                        pointer-events: auto;
                        display: block;
                    }

                    .section-content.hidden {
                        display: none !important;
                    }
                </style>

                <div id="projects" class="bg-gray-100 py-24 sm:py-32">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:mx-0">
                            <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Projecten
                                leerjaar
                                1
                            </h2>
                            <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:</p>
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
                            <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:</p>
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
                            <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Eigen projecten
                            </h2>
                            <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:</p>
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
