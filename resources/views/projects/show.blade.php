<x-projects-layout>
    @if ($project->banner)
        <div class="mb-4 w-full h-100">
            <img src="{{ asset('storage/' . $project->banner) }}" alt="Banner" class="mb-4 w-full crop-top">
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>

        @auth

            <a href="{{ route('projects.edit', $project->id) }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                    </path>
                </svg>
                Edit
            </a>

            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    Delete
                </button>
            </form>
        @endauth

    </div>

    <div class="max-w-7xl mx-auto px-4 xs:mt-50 sm:px-6 lg:px-8 py-8">
        <div class="mb-4">
            <h1 class="text-7xl mb-4">{{ $project->title }}</h1>
            <div class="mb-4">
                <h2>Year {{ $project->year }}</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2">

            <div class="space-y-4 w-full h-full sm:col-span-1">
                <p class="text-lg text-gray-600 leading-relaxed mb-1 w-full break-words">
                    {{ $project->heading1 }}
                </p>
                <p class="text-lg text-gray-600 leading-relaxed mb-4 w-full break-words">
                    {{ $project->heading2 }}
                </p>
            </div>
            <div class="space-y-4 w-full h-full sm:col-span-1">
                <p class="text-lg text-gray-600 leading-relaxed mb-4 w-full break-words">
                    {{ $project->heading3 }}
                </p>
                <p class="text-lg text-gray-600 leading-relaxed mb-4 w-full break-words">
                    {{ $project->heading4 }}
                </p>
                <a href="{{ $project->url }}" target="_blank" type="button"
                    class="bg-blue-400 py-1 px-2 rounded-lg shadow-custom hover-knop hover-knop:hover">View
                    Project</a>
            </div>
            @if ($project->images)
                <div class="flex flex-wrap space-x-4 mt-4 w-full h-64 sm:col-span-2">
                    @foreach ($project->images as $image)
                        <img src="{{ asset('storage/' . $image) }}" class="rounded-lg" alt="Image"
                            style="max-width: 100%; height: auto;">
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-projects-layout>
