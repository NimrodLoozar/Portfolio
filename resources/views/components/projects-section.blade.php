@props(['projects'])

<div id="projects" class="py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                Projecten leerjaar 1
            </h2>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Here are some of the projects I have worked on:</p>
        </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
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
                Projecten leerjaar 2
            </h2>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Here are some of the projects I have worked on:</p>
        </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
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
                Eigen projecten
            </h2>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Here are some of the projects I have worked on:</p>
        </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
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
