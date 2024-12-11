<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>

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
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="#" class="text-sm/6 font-semibold text-white">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
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
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply"
                alt="" class="absolute inset-0 -z-10 size-full object-cover object-right md:object-center">
            <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
                aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
                aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8 flex flex-col lg:flex-row items-center">
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
            </div>
        </div>
        <div class="absolute top-0 right-40 lg:w-1/4 mt-10 lg:mt-0 flex justify-center lg:justify-end">
            <img src="{{ asset('img/20240807_185820.jpg') }}" alt="Your Name"
                class="w-3/4 lg:w-full scale-110 object-cover shadow-[10px_10px_20px_rgba(0,0,0,0.5)] crop-top-third">
        </div>

        <div id="about" class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Over mij
                    </h2>
                    <p class="mt-2 text-lg/8 text-gray-600">Ik ben in <strong>2006</strong> in
                        <strong>Hongarije</strong> geboren, na mijn tiende zijn we
                        naar nederland verhuizd, sinds dien leef ik hier. In de vakanties ga bijna elke keer naar
                        Hongarije toe om
                        familie te ontmoeten. In 2023 heb ik mijn middelbare afgerond op <strong>mavo</strong> niveau in
                        Soest op het
                        <strong class="text-green-500"><a href="https://griftland.nl/" target="_blank">Griftland
                                College</a></strong>.
                        Daarna ben ik op
                        <strong class="text-blue-500"><a href="https://www.mboutrecht.nl/academies/ict-academie/"
                                target="_blank">MBO
                                Utrecht ICT Academie</a></strong> gaan studeren voor
                        <strong><a href="https://www.mboutrecht.nl/opleidingen/software-developer/"
                                target="_blank">Software developper niveau 4</a></strong>.
                    </p>
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
        </div>

        <div id="projects" class="bg-gray-100 py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Projecten leerjaar 1
                    </h2>
                    <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:</p>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <!-- Add your project details here -->
                    <a href="https://github.com/Marzz616/GIT2.git" target="_blank">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold text-gray-900">Project 1</h3>
                            <p class="mt-2 text-gray-600">Description of project 1.</p>
                        </div>
                    </a>
                    <a href="" target="_blank">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold text-gray-900">Project 2</h3>
                            <p class="mt-2 text-gray-600">Description of project 2.</p>
                        </div>
                    </a>
                    <!-- Add more projects as needed -->
                </div>
                <br>
                <div class="mx-auto max-w-2xl lg:mx-0 border-t border-gray-300 pt-5">
                    <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Projecten leerjaar 2
                    </h2>
                    <p class="mt-2 text-lg text-gray-600">Here are some of the projects I have worked on:</p>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <!-- Add your project details here -->
                    <a href="/project" target="_blank">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold text-gray-900">Project 1</h3>
                            <p class="mt-2 text-gray-600">Description of project 1.</p>
                        </div>
                    </a>
                    <a href="" target="_blank">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold text-gray-900">Project 2</h3>
                            <p class="mt-2 text-gray-600">Description of project 2.</p>
                        </div>
                    </a>
                    <!-- Add more projects as needed -->
                </div>
            </div>
        </div>

        <div id="contact" class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Contact</h2>
                    <p class="mt-2 text-lg text-gray-600">Feel free to reach out to me through the following methods:
                    </p>
                </div>
                <div class="mt-10">
                    <form action="#" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
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
