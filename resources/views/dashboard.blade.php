<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('app.dashboard_title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Welcome Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 border-b border-gray-200 dark:border-gray-700">
                    <div class="mt-8 text-2xl font-bold text-gray-900 dark:text-gray-100">
                        {{ __('app.dashboard_welcome_message') }}
                    </div>

                    <div class="mt-6 text-gray-500 dark:text-gray-400 text-lg">
                        {{ __('app.dashboard_manage_projects') }}
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('projects.create') }}"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create New Project
                        </a>
                    </div>
                </div>
            </div>

            <!-- Projects Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                            Your Projects
                        </h3>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            {{ count($projects) }} {{ count($projects) === 1 ? 'project' : 'projects' }}
                        </div>
                    </div>

                    @if ($projects->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach ($projects as $project)
                                <div
                                    class="group relative bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-200 dark:border-gray-600">
                                    <div class="p-6">
                                        <div class="flex items-center justify-between mb-4">
                                            <h4
                                                class="text-xl font-bold text-gray-900 dark:text-gray-100 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                                                {{ $project->title }}
                                            </h4>
                                            <div class="w-3 h-3 bg-green-400 rounded-full shadow-sm"></div>
                                        </div>

                                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-2">
                                            {{ $project->description }}
                                        </p>

                                        @if ($project->year)
                                            <div
                                                class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-4">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                {{ $project->year }}
                                            </div>
                                        @endif

                                        <div class="flex items-center justify-between">
                                            <form action="{{ route('projects.show', $project) }}" method="GET"
                                                class="flex-1">
                                                <button type="submit"
                                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all duration-200 hover:shadow-lg transform hover:scale-105">
                                                    {{ __('app.view_project') }}
                                                </button>
                                            </form>

                                            <div class="ml-2 flex space-x-1">
                                                <a href="{{ route('projects.edit', $project) }}"
                                                    class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors duration-200">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-16">
                            <!-- From Uiverse.io by Cobp -->
                            <section class="relative group flex flex-col items-center justify-center w-full h-full">
                                <div
                                    class="file relative w-60 h-40 cursor-pointer origin-bottom [perspective:1500px] z-50">
                                    <div
                                        class="work-5 bg-amber-600 w-full h-full origin-top rounded-2xl rounded-tl-none group-hover:shadow-[0_20px_40px_rgba(0,0,0,.2)] transition-all ease duration-300 relative after:absolute after:content-[''] after:bottom-[99%] after:left-0 after:w-20 after:h-4 after:bg-amber-600 after:rounded-t-2xl before:absolute before:content-[''] before:-top-[15px] before:left-[75.5px] before:w-4 before:h-4 before:bg-amber-600 before:[clip-path:polygon(0_35%,0%_100%,50%_100%);]">
                                    </div>
                                    <div
                                        class="work-4 absolute inset-1 bg-zinc-400 rounded-2xl transition-all ease duration-300 origin-bottom select-none group-hover:[transform:rotateX(-20deg)]">
                                    </div>
                                    <div
                                        class="work-3 absolute inset-1 bg-zinc-300 rounded-2xl transition-all ease duration-300 origin-bottom group-hover:[transform:rotateX(-30deg)]">
                                    </div>
                                    <div
                                        class="work-2 absolute inset-1 bg-zinc-200 rounded-2xl transition-all ease duration-300 origin-bottom group-hover:[transform:rotateX(-38deg)]">
                                    </div>
                                    <div
                                        class="work-1 absolute bottom-0 bg-gradient-to-t from-amber-500 to-amber-400 w-full h-[156px] rounded-2xl rounded-tr-none after:absolute after:content-[''] after:bottom-[99%] after:right-0 after:w-[146px] after:h-[16px] after:bg-amber-400 after:rounded-t-2xl before:absolute before:content-[''] before:-top-[10px] before:right-[142px] before:size-3 before:bg-amber-400 before:[clip-path:polygon(100%_14%,50%_100%,100%_100%);] transition-all ease duration-300 origin-bottom flex items-center justify-center group-hover:shadow-[inset_0_20px_40px_#fbbf24,_inset_0_-20px_40px_#d97706] group-hover:[transform:rotateX(-46deg)_translateY(1px)]">
                                        <p class="text-white text-sm font-medium">No projects yet</p>
                                    </div>
                                </div>
                            </section>

                            <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-gray-100">No projects yet</h3>
                            <p class="mt-2 text-gray-500 dark:text-gray-400">Get started by creating your first project.
                            </p>
                            <div class="mt-6">
                                <a href="{{ route('projects.create') }}"
                                    class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Create Your First Project
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
