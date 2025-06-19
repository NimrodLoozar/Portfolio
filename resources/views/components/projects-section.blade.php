@props(['projects'])

<div id="projects" class="py-24 sm:py-32">
    <div id="fade-animationLeft" class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                {{ __('app.projects_year1_title') }}
            </h2>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">{{ __('app.projects_description') }}</p>
        </div>
        <div id="fade-animationRight"
            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($projects->where('year', '1') as $project)
                <a href="{{ route('projects.show', $project->id) }}"
                    class="project bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $project->title }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $project->description }}</p>
                </a>
            @endforeach
        </div>

        <br>

        <div class="mx-auto max-w-2xl lg:mx-0 border-t border-gray-300 dark:border-gray-700 pt-5">
            <h2 class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                {{ __('app.projects_year2_title') }}
            </h2>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">{{ __('app.projects_description') }}</p>
        </div>
        <div id="fade-animationRight"
            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($projects->where('year', '2') as $project)
                <a href="{{ route('projects.show', $project->id) }}"
                    class="project bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $project->title }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $project->description }}</p>
                </a>
            @endforeach
        </div>

        <br>

        <div class="mx-auto max-w-2xl lg:mx-0 border-t border-gray-300 dark:border-gray-700 pt-5">
            <h2 class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                {{ __('app.projects_personal_title') }}
            </h2>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">{{ __('app.projects_description') }}</p>
        </div>
        <div id="fade-animationRight"
            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($projects->where('year', 'Eigen project') as $project)
                <a href="{{ route('projects.show', $project->id) }}"
                    class="project bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $project->title }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $project->description }}</p>
                </a>
            @endforeach
        </div>
    </div>
</div>

<!-- Modern Knight Game Demo Section -->
<div class="py-24 sm:py-32">
    <div class="mx-64 max-w-full px-6 lg:px-8">
        <iframe class="w-full h-screen border-4 border-gray-300" src="{{ asset('ModernKnight/index.html') }}"
            frameborder="0"></iframe>
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
</script>
