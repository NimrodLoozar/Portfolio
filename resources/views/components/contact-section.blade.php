<div id="contact" class="py-24 sm:py-32">
    <div id="fade-animationLeft" class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                {{ __('app.contact_title') }}
            </h2>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">{{ __('app.contact_description') }}</p>
        </div>
        <div class="mt-10">
            <form action="#" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                <div id="fade-animationTopLeft">
                    <label for="name"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.contact_name') }}</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" autocomplete="name"
                            class="block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 sm:text-sm">
                    </div>
                </div>
                <div id="fade-animationTopRight">
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.contact_email') }}</label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email" autocomplete="email"
                            class="block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 sm:text-sm">
                    </div>
                </div>
                <div id="fade-animationUp" class="sm:col-span-2">
                    <label for="message"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.contact_message') }}</label>
                    <div class="mt-1">
                        <textarea id="message" name="message" rows="4"
                            class="block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 sm:text-sm"></textarea>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 dark:bg-indigo-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800">{{ __('app.contact_send') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // FadeInLeft animation
    var grids = document.querySelectorAll('#fade-animationLeft');
    grids.forEach(function(grid) {
        if (!grid) return;
        grid.style.opacity = '0';
        var animated = false;
        var skillObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !animated) {
                    grid.classList.add('animate__animated', 'animate__fadeInLeft');
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

    // FadeInRight animation
    var grids = document.querySelectorAll('#fade-animationRight');
    grids.forEach(function(grid) {
        if (!grid) return;
        grid.style.opacity = '0';
        var animated = false;
        var skillObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !animated) {
                    setTimeout(function() {
                        grid.classList.add('animate__animated', 'animate__fadeInRight');
                        grid.style.opacity = '1';
                    }, 300);
                    animated = true;
                    skillObserver.disconnect();
                }
            });
        }, {
            threshold: 0.3
        });
        skillObserver.observe(grid);
    });

    // FadeInTopLeft animation
    var grids = document.querySelectorAll('#fade-animationTopLeft');
    grids.forEach(function(grid) {
        if (!grid) return;
        grid.style.opacity = '0';
        var animated = false;
        var skillObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !animated) {
                    setTimeout(function() {
                        grid.classList.add('animate__animated',
                            'animate__fadeInTopLeft');
                        grid.style.opacity = '1';
                    }, 800);
                    animated = true;
                    skillObserver.disconnect();
                }
            });
        }, {
            threshold: 0.3
        });
        skillObserver.observe(grid);
    });

    // FadeInTopRight animation
    var grids = document.querySelectorAll('#fade-animationTopRight');
    grids.forEach(function(grid) {
        if (!grid) return;
        grid.style.opacity = '0';
        var animated = false;
        var skillObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !animated) {
                    setTimeout(function() {
                        grid.classList.add('animate__animated',
                            'animate__fadeInTopRight');
                        grid.style.opacity = '1';
                    }, 800);
                    animated = true;
                    skillObserver.disconnect();
                }
            });
        }, {
            threshold: 0.3
        });
        skillObserver.observe(grid);
    });

    // FadeInUp animation
    var grids = document.querySelectorAll('#fade-animationUp');
    grids.forEach(function(grid) {
        if (!grid) return;
        grid.style.opacity = '0';
        var animated = false;
        var skillObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !animated) {
                    setTimeout(function() {
                        grid.classList.add('animate__animated', 'animate__fadeInUp');
                        grid.style.opacity = '1';
                    }, 800);
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
