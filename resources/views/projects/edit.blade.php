{{-- edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Project
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $project->title }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                <input type="text" name="year" id="year" value="{{ $project->year }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="banner" class="block text-sm font-medium text-gray-700">Banner</label>
                <input type="file" name="banner" id="banner"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description"
                    class="mt-1 px-4 pt-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $project->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="heading1" class="block text-sm font-medium text-gray-700">Heading 1</label>
                <textarea name="heading1" id="heading1"
                    class="mt-1 px-4 pt-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $project->heading1 }}</textarea>
            </div>

            <div class="mb-4">
                <label for="heading2" class="block text-sm font-medium text-gray-700">Heading 2</label>
                <textarea name="heading2" id="heading2"
                    class="mt-1 px-4 pt-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $project->heading2 }}</textarea>
            </div>

            <div class="mb-4">
                <label for="heading3" class="block text-sm font-medium text-gray-700">Heading 3</label>
                <textarea name="heading3" id="heading3"
                    class="mt-1 px-4 pt-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $project->heading3 }}</textarea>
            </div>

            <div class="mb-4">
                <label for="heading4" class="block text-sm font-medium text-gray-700">Heading 4</label>
                <textarea name="heading4" id="heading4"
                    class="mt-1 px-4 pt-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $project->heading4 }}</textarea>
            </div>

            <div class="mb-4">
                <a href="{{ url('/projects/' . $project->id) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Back
                </a>
            </div>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7">
                    </path>
                </svg>
                Update
            </button>

        </form>

        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="inline-flex items-center mt-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                Delete
            </button>
        </form>
    </div>
</x-app-layout>
