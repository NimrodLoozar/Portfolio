<!-- Section Contents (Skills Breakdown) -->
<div class="w-full">
    <!-- Programming Languages Section -->
    <div id="section-languages"
        class="section-content fade-section flex-1 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 border border-blue-200 dark:border-blue-700 rounded-xl p-6 shadow-lg">
        <h3 class="text-2xl font-bold mb-8 text-blue-700 dark:text-blue-300 text-center">
            {{ __('app.skills_programming_languages') }}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 skillsGrid"
            data-skill-group="languages" id="fade-animationLeft">
            @foreach ($skillsLanguages as $skill)
                <x-skill-card :name="$skill['name']" :icon="$skill['icon']" :color="$skill['color']" :bg="$skill['bg']" :border="$skill['border']"
                    :stroke="$skill['stroke']" :target="$skill['target']" :desc="$skill['desc']" />
            @endforeach
        </div>
    </div>

    <!-- Libraries / Version Control Section -->
    <div id="section-libraries"
        class="section-content fade-section hidden flex-1 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 border border-purple-200 dark:border-purple-700 rounded-xl p-6 shadow-lg">
        <h3 class="text-2xl font-bold mb-8 text-purple-700 dark:text-purple-300 text-center">
            {{ __('app.skills_libraries_version_control') }}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 skillsGrid"
            data-skill-group="libraries" id="fade-animationLeft">
            @foreach ($skillsLibraries as $skill)
                <x-skill-card :name="$skill['name']" :icon="$skill['icon']" :color="$skill['color']" :bg="$skill['bg']"
                    :border="$skill['border']" :stroke="$skill['stroke']" :target="$skill['target']" :desc="$skill['desc']" />
            @endforeach
        </div>
    </div>

    <!-- Social Media Section -->
    <div id="section-social"
        class="section-content fade-section hidden flex-1 bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20 border border-pink-200 dark:border-pink-700 rounded-xl p-6 shadow-lg">
        <h3 class="text-2xl font-bold mb-8 text-pink-700 dark:text-pink-300 text-center">{{ __('app.skills_social_media') }}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 skillsGrid"
            data-skill-group="social" id="fade-animationLeft">
            @foreach ($skillsSocial as $skill)
                <x-skill-card :name="$skill['name']" :icon="$skill['icon']" :color="$skill['color']" :bg="$skill['bg']"
                    :border="$skill['border']" :stroke="$skill['stroke']" :target="$skill['target']" :desc="$skill['desc']" :showChart="false" />
            @endforeach
        </div>
    </div>
</div>

<style>
    .fade-section {
        opacity: 1;
        transition: opacity 0.5s;
        pointer-events: auto;
        display: block;
    }

    .fade-section.fade-out {
        opacity: 0;
        transition: opacity 0.2s;
        pointer-events: none;
    }

    .fade-section.fade-in {
        opacity: 1;
        transition: opacity 0.5s;
        pointer-events: auto;
    }

    .fade-section.hidden {
        display: none;
    }
</style>
