<x-projects-layout>
    @if ($project->banner)
        <div class="mb-4 w-full h-100">
            <img src="{{ asset('storage/' . $project->banner) }}" alt="Banner" class="mb-4 w-full crop-top">
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 transition ease-in-out delay-75 hover:bg-blue-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110">
            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-5 w-5 mr-2"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>

        @auth

            <a href="{{ route('projects.edit', $project->id) }}"
                class="inline-flex items-center mx-2 px-4 py-2 bg-blue-600 transition ease-in-out delay-75 hover:bg-blue-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110">
                <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-5 w-5 mr-2"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                Edit
            </a>

            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <!-- From Uiverse.io by seyed-mohsen-mousavi -->
                <button
                    class="inline-flex items-center px-4 py-2 bg-red-600 transition ease-in-out delay-75 hover:bg-red-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110">
                    <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-5 w-5 mr-2"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                            stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
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
                <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed mb-1 w-full break-words">
                    {{ $project->heading1 }}
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed mb-4 w-full break-words">
                    {{ $project->heading2 }}
                </p>
            </div>
            <div class="space-y-4 w-full h-full sm:col-span-1">
                <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed mb-4 w-full break-words">
                    {{ $project->heading3 }}
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed mb-4 w-full break-words">
                    {{ $project->heading4 }}
                </p>


                <!-- From Uiverse.io by Javierrocadev -->
                <a href="{{ $project->url }}" target="_blank"
                    class="group flex justify-center items-center gap-2 group-hover:before:duration-500 group-hover:after:duration-500 after:duration-500 hover:border-neutral-900 duration-500 hover:duration-500 underline underline-offset-2 hover:underline hover:underline-offset-4 origin-left hover:decoration-2 hover:text-neutral-300 relative bg-gray-900 px-10 py-4 border text-left p-3 text-gray-50 text-base font-bold rounded-lg overflow-hidden after:absolute after:z-10 after:w-12 after:h-12 after:content[''] after:bg-sky-900 after:-left-8 after:top-8 after:rounded-full after:blur-lg hover:after:animate-pulse">
                    <svg class="w-6 h-6 fill-gray-50" height="100" preserveAspectRatio="xMidYMid meet"
                        viewBox="0 0 100 100" width="100" x="0" xmlns="http://www.w3.org/2000/svg" y="0">
                        <path class="svg-fill-primary"
                            d="M50,1.23A50,50,0,0,0,34.2,98.68c2.5.46,3.41-1.09,3.41-2.41s0-4.33-.07-8.5c-13.91,3-16.84-6.71-16.84-6.71-2.28-5.77-5.55-7.31-5.55-7.31-4.54-3.1.34-3,.34-3,5,.35,7.66,5.15,7.66,5.15C27.61,83.5,34.85,81.3,37.7,80a10.72,10.72,0,0,1,3.17-6.69C29.77,72.07,18.1,67.78,18.1,48.62A19.34,19.34,0,0,1,23.25,35.2c-.52-1.26-2.23-6.34.49-13.23,0,0,4.19-1.34,13.75,5.13a47.18,47.18,0,0,1,25,0C72.07,20.63,76.26,22,76.26,22c2.72,6.89,1,12,.49,13.23a19.28,19.28,0,0,1,5.14,13.42c0,19.21-11.69,23.44-22.83,24.67,1.8,1.55,3.4,4.6,3.4,9.26,0,6.69-.06,12.08-.06,13.72,0,1.34.9,2.89,3.44,2.4A50,50,0,0,0,50,1.23Z">
                        </path>
                    </svg>
                    Github
                </a>


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
