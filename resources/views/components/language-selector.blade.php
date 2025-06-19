@php
    $uniqueId = uniqid('lang-');
@endphp

<div class="relative inline-block text-left">
    <div>
        <button type="button" id="{{ $uniqueId }}-button"
            class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white dark:bg-gray-800 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200"
            aria-expanded="false" aria-haspopup="true">
            <span class="uppercase">{{ app()->getLocale() }}</span>
            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div id="{{ $uniqueId }}-menu"
        class="absolute right-0 z-50 mt-2 w-56 origin-top-right rounded-md bg-white dark:bg-gray-800 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
        role="menu" aria-orientation="vertical" aria-labelledby="{{ $uniqueId }}-button" tabindex="-1">
        <div class="py-1" role="none">
            <a href="{{ route('language.switch', 'en') }}"
                class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ app()->getLocale() == 'en' ? 'bg-gray-100 dark:bg-gray-700' : '' }}"
                role="menuitem">
                <div class="flex items-center">
                    <span class="mr-3 text-lg">🇬🇧</span>
                    <span>English</span>
                </div>
                @if (app()->getLocale() == 'en')
                    <svg class="h-4 w-4 text-blue-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                @endif
            </a>
            <a href="{{ route('language.switch', 'hu') }}"
                class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ app()->getLocale() == 'hu' ? 'bg-gray-100 dark:bg-gray-700' : '' }}"
                role="menuitem">
                <div class="flex items-center">
                    <span class="mr-3 text-lg">🇭🇺</span>
                    <span>Magyar</span>
                </div>
                @if (app()->getLocale() == 'hu')
                    <svg class="h-4 w-4 text-blue-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                @endif
            </a>
            <a href="{{ route('language.switch', 'nl') }}"
                class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ app()->getLocale() == 'nl' ? 'bg-gray-100 dark:bg-gray-700' : '' }}"
                role="menuitem">
                <div class="flex items-center">
                    <span class="mr-3 text-lg">🇳🇱</span>
                    <span>Nederlands</span>
                </div>
                @if (app()->getLocale() == 'nl')
                    <svg class="h-4 w-4 text-blue-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                @endif
            </a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('{{ $uniqueId }}-button');
        const menu = document.getElementById('{{ $uniqueId }}-menu');

        console.log('Language selector initialized:', '{{ $uniqueId }}', button, menu);

        if (button && menu) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Language button clicked, toggling menu');
                menu.classList.toggle('hidden');

                // Update aria-expanded
                const isExpanded = !menu.classList.contains('hidden');
                button.setAttribute('aria-expanded', isExpanded);
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!button.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.add('hidden');
                    button.setAttribute('aria-expanded', 'false');
                }
            });

            // Close menu on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                    button.setAttribute('aria-expanded', 'false');
                    button.focus();
                }
            });
        } else {
            console.error('Language selector elements not found:', '{{ $uniqueId }}');
        }
    });
</script>
