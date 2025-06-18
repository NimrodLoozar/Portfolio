<div
    class="flex flex-col items-center justify-between bg-gradient-to-br {{ $bg }} p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 {{ $border }} skill-card group hover:scale-105 min-h-[240px]">
    <div class="flex flex-col items-center w-full">
        <div class="flex items-center justify-center mb-2 w-16 h-16">
            <img src="{{ asset($icon) }}" alt="{{ $name }}" class="w-12 h-12 object-contain" />
        </div>
        <div class="relative w-16 h-16 mb-2">
            <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 36 36">
                <path stroke="{{ $stroke[0] }}" stroke-width="3" fill="none"
                    d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                <path class="progress-path" stroke="{{ $stroke[1] }}" stroke-width="3" fill="none"
                    stroke-linecap="round" stroke-dasharray="0, 100" data-target="{{ $target }}"
                    d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
            </svg>
            <div class="absolute inset-0 flex items-center justify-center">
                <span
                    class="text-base font-bold text-{{ $color }}-700 dark:text-{{ $color }}-300 progress-text">0%</span>
            </div>
        </div>
    </div>
    <h3 class="text-base font-bold text-center text-{{ $color }}-700 dark:text-{{ $color }}-300 mb-1">
        {{ $name }}
    </h3>
    <p class="text-xs text-center text-{{ $color }}-600 dark:text-{{ $color }}-400">
        {{ $desc }}
    </p>
</div>
