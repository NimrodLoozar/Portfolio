{{-- edit.blade.php --}}
<x-app-layout> <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('app.edit_project') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Display success/error messages --}}
        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">There were some problems with your input:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH') <div class="mb-4">
                <label for="title"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.title') }}</label>
                <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}"
                    class="mt-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md">
            </div>

            <div class="mb-4">
                <label for="url"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.url') }}</label>
                <input type="url" name="url" id="url" value="{{ old('url', $project->url) }}"
                    class="mt-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md">
            </div>

            <div class="col-span-full">
                <label for="year"
                    class="block text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('app.year') }}</label>
                <div class="mt-2">
                    <select name="year" id="year" required
                        class="block px-2 py-2 w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="1" {{ $project->year == '1' ? 'selected' : '' }}>{{ __('app.year_1') }}
                        </option>
                        <option value="2" {{ $project->year == '2' ? 'selected' : '' }}>{{ __('app.year_2') }}
                        </option>
                        <option value="Eigen project" {{ $project->year == 'Eigen project' ? 'selected' : '' }}>
                            {{ __('app.personal_project') }}</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="banner"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.banner') }}</label>
                <input type="file" name="banner" id="banner"
                    class="mt-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md">
            </div>

            <div class="mb-4">
                <label for="description"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.description') }}</label>
                <textarea name="description" id="description"
                    class="mt-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="heading1"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.heading_1') }}</label>
                <textarea name="heading1" id="heading1"
                    class="mt-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md">{{ old('heading1', $project->heading1) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="heading2"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.heading_2') }}</label>
                <textarea name="heading2" id="heading2"
                    class="mt-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md">{{ old('heading2', $project->heading2) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="heading3"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.heading_3') }}</label>
                <textarea name="heading3" id="heading3"
                    class="mt-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md">{{ $project->heading3 }}</textarea>
            </div>
            <div class="mb-4">
                <label for="heading4"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('app.heading_4') }}</label>
                <textarea name="heading4" id="heading4"
                    class="mt-1 px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md">{{ $project->heading4 }}</textarea>
            </div>


            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-green-600 transition ease-in-out delay-75 hover:bg-green-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7">
                    </path>
                </svg>
                {{ __('app.update') }}
            </button>

        </form>

        <div class="my-4">
            <a href="{{ route('projects.show', $project->id) }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 transition ease-in-out delay-75 hover:bg-blue-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
                {{ __('app.back') }}
            </a>
        </div>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')

            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-red-600 transition ease-in-out delay-75 hover:bg-red-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110"
                onclick="return confirm('{{ __('app.delete_confirm') }}')">
                <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-5 w-5 mr-2"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                        stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
                {{ __('app.delete') }}
            </button>
        </form>
    </div>
</x-app-layout>
