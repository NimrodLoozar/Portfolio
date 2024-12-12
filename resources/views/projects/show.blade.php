<x-projects-layout>
    @if ($project->banner)
        <div class="relative h-full w-full isolate overflow-hidden bg-gray-900">
            <img src="{{ asset('storage/' . $project->banner) }}" alt="Banner"
                class=" size-full object-cover object-right md:object-center crop-top-third-banner">
        </div>
    @endif

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">{{ $project->title }}</h1>
        <p class="mt-4 text-lg text-gray-600">{{ $project->description }}</p>
        <a href="{{ $project->url }}" target="_blank" class="mt-4 inline-block text-indigo-600 hover:text-indigo-900">View
            Project</a>

        @if ($project->images)
            <div class="mt-8">
                <h2 class="text-2xl font-semibold text-gray-900">Images</h2>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($project->images as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Image" class="w-full rounded-lg shadow-lg">
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-projects-layout>
