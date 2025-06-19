<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('app.dashboard_title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 border-b border-gray-200 dark:border-gray-700">
                    <div class="mt-8 text-2xl">
                        {{ __('app.dashboard_welcome_message') }}
                    </div>

                    <div class="mt-6 text-gray-500 dark:text-gray-400">
                        {{ __('app.dashboard_manage_projects') }}
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('projects.create') }}"
                            class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded">
                            Create New Project
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
