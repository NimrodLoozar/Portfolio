<x-app-layout>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data"
        class="mt-4 max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 dark:border-gray-700 pb-12">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Create Project</h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Fill out the details of your new project.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title"
                            class="block text-sm font-medium text-gray-900 dark:text-gray-100">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" required
                                class="bg-gray-200 dark:bg-gray-700 dark:text-gray-100 px-2 h-10 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="description"
                            class="block text-sm font-medium text-gray-900 dark:text-gray-100">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="description" rows="3" maxlength="30" required
                                class="bg-gray-200 dark:bg-gray-700 dark:text-gray-100 px-2 h-10 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="heading1" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Heading
                            1</label>
                        <div class="mt-2">
                            <textarea name="heading1" id="heading1" rows="3" required
                                class="bg-gray-200 dark:bg-gray-700 dark:text-gray-100 px-2 h-10 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="heading2" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Heading
                            2</label>
                        <div class="mt-2">
                            <textarea name="heading2" id="heading2" rows="3"
                                class="bg-gray-200 dark:bg-gray-700 dark:text-gray-100 px-2 h-10 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="heading3" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Heading
                            3</label>
                        <div class="mt-2">
                            <textarea name="heading3" id="heading3" rows="3"
                                class="bg-gray-200 dark:bg-gray-700 dark:text-gray-100 px-2 h-10 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="heading4" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Heading
                            4</label>
                        <div class="mt-2">
                            <textarea name="heading4" id="heading4" rows="3"
                                class="bg-gray-200 dark:bg-gray-700 dark:text-gray-100 px-2 h-10 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="url"
                            class="block text-sm font-medium text-gray-900 dark:text-gray-100">URL</label>
                        <div class="mt-2">
                            <input type="url" name="url" id="url" required
                                class="bg-gray-200 dark:bg-gray-700 dark:text-gray-100 px-2 h-10 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="year"
                            class="block text-sm font-medium text-gray-900 dark:text-gray-100">Year</label>
                        <div class="mt-2">
                            <select name="year" id="year" required
                                class="bg-white dark:bg-gray-700 dark:text-gray-100 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="1">Leerjaar 1</option>
                                <option value="2">Leerjaar 2</option>
                                <option value="Eigen project">Eigen project</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="banner"
                            class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Banner</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 dark:border-gray-700 px-6 py-10"
                            id="banner-upload-container">
                            <div class="text-center">
                                <svg class="mx-auto size-12 text-gray-300 dark:text-gray-600" viewBox="0 0 24 24"
                                    fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm/6 text-gray-600 dark:text-gray-400">
                                    <label for="banner"
                                        class="relative cursor-pointer rounded-md bg-white dark:bg-gray-800 font-semibold text-indigo-600 dark:text-indigo-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input type="file" name="banner" id="banner" class="sr-only"
                                            onchange="displayFilePreview('banner')">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs/5 text-gray-600 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                        <div id="banner-preview" class="mt-2"></div>
                    </div>

                    <div class="col-span-full">
                        <label for="images"
                            class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Images</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 dark:border-gray-700 px-6 py-10"
                            id="images-upload-container">
                            <div class="text-center">
                                <svg class="mx-auto size-12 text-gray-300 dark:text-gray-600" viewBox="0 0 24 24"
                                    fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm/6 text-gray-600 dark:text-gray-400">
                                    <label for="images"
                                        class="relative cursor-pointer rounded-md bg-white dark:bg-gray-800 font-semibold text-indigo-600 dark:text-indigo-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input type="file" name="images[]" id="images" multiple
                                            class="sr-only" onchange="displayFilePreview('images')">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs/5 text-gray-600 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                        <div id="images-preview" class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-4"></div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold text-gray-900 dark:text-gray-100"
                        onclick="redirectToDashboard()">Cancel</button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
    </form>
    <script>
        function displayFileName(inputId) {
            const input = document.getElementById(inputId);
            const fileNameElement = document.getElementById(`${inputId}-filename`);
            const files = input.files;
            if (files.length > 0) {
                const fileNames = Array.from(files).map(file => file.name).join(', ');
                fileNameElement.textContent = fileNames;
            } else {
                fileNameElement.textContent = '';
            }
        }

        function displayFilePreview(inputId) {
            const input = document.getElementById(inputId);
            const previewContainer = document.getElementById(`${inputId}-preview`);
            const uploadContainer = document.getElementById(`${inputId}-upload-container`);
            previewContainer.innerHTML = '';
            const files = input.files;
            if (files.length > 0) {
                uploadContainer.style.display = 'none';
                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('h-40', 'w-full', 'object-cover', 'rounded-md', 'shadow-sm');
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }

        function redirectToDashboard() {
            window.location.href = "{{ route('dashboard') }}";
        }
    </script>
</x-app-layout>
