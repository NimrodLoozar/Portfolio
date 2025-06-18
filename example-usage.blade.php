{{-- Example of how to use the new Skills Breakdown component --}}

{{-- Include the section buttons (you'll still need these in your main view) --}}
<div class="flex flex-wrap justify-center gap-4 mb-8">
    <button id="btn-languages"
        class="section-btn active px-6 py-2 rounded-lg font-semibold bg-blue-600 text-white shadow hover:bg-blue-700 transition"
        data-section="languages">Programming Languages</button>
    <button id="btn-libraries"
        class="section-btn px-6 py-2 rounded-lg font-semibold bg-purple-600 text-white shadow hover:bg-purple-700 transition"
        data-section="libraries">Libraries / Version Control</button>
    <button id="btn-social"
        class="section-btn px-6 py-2 rounded-lg font-semibold bg-pink-600 text-white shadow hover:bg-pink-700 transition"
        data-section="social">Social Media</button>
</div>

{{-- Replace the entire Skills Breakdown section with this single component --}}
<x-skills-breakdown />

{{-- Example of using individual skill cards (if you want to use them separately) --}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <x-skill-card name="Laravel" icon="img/laravel-2.svg" color="red"
        bg="from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20" border="border-red-200 dark:border-red-700"
        :stroke="['#fca5a5', '#ef4444']" :target="75" desc="MVC framework & APIs" />

    <x-skill-card name="React" icon="img/react-2.svg" color="cyan"
        bg="from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20"
        border="border-cyan-200 dark:border-cyan-700" :stroke="['#67e8f9', '#06b6d4']" :target="60"
        desc="Component-based development" />
</div>
