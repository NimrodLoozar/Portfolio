{{-- Overvieuw van alle projecten --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($projects as $project)
            <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg shadow-custom">
                <h2 class="text-xl font-semibold">{{ $project->title }}</h2>
                <p class="text-gray-600">{{ $project->description }}</p>
                <form action="{{ route('projects.show', $project) }}" method="GET">
                    <button type="submit"
                        class="mt-4 bg-blue-400 py-1 px-2 rounded-lg shadow-custom hover:bg-blue-500 text-white">
                        View Project
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
