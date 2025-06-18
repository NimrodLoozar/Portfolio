<div class="py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center">
        <div id="about" class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-28">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:w-2/3">
                <h2
                    class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                    Over
                    mij</h2>
                <p class="mt-2 text-lg/8 text-gray-600 dark:text-gray-300">Ik ben in <strong>2006</strong> in
                    <strong>Hongarije</strong> geboren, na mijn tiende zijn we naar nederland verhuizd, sinds
                    dien leef ik hier. In de vakanties ga bijna elke keer naar Hongarije toe om familie te
                    ontmoeten. In 2023 heb ik mijn middelbare afgerond op <strong>mavo</strong> niveau in Soest
                    op het <strong class="text-green-500"><a href="https://griftland.nl/" target="_blank"
                            class="hover:text-green-300"><u>Griftland
                                College</u></a></strong>. Daarna ben ik op <strong class="text-blue-500"><a
                            href="https://www.mboutrecht.nl/academies/ict-academie/" target="_blank"
                            class="hover:text-blue-300"><u>MBO Utrecht ICT
                                Academie</u></a></strong> gaan studeren voor <strong><a
                            href="https://www.mboutrecht.nl/opleidingen/software-developer/" target="_blank"
                            class="text-gray-300 hover:text-gray-500"><u>Software
                                developper niveau 4</u></a></strong>.
                </p>
            </div>
            <div class="lg:w-1/3 flex justify-center lg:justify-end">
                <img id="about-photo" src="{{ asset('img/20240807_185820.jpg') }}" alt="Your Name"
                    class="w-3/4 lg:w-full scale-110 object-cover shadow-[10px_10px_20px_rgba(0,0,0,0.5)] rounded-lg dark:shadow-[10px_10px_20px_rgba(0,0,0,0.8)]"
                    style="opacity:0;">
            </div>
        </div>

        <div class="w-full flex flex-col gap-8 mt-16 lg:mt-24 mb-8">
            <!-- Section Buttons -->
            <div class="w-full flex justify-center gap-4 mb-8">
                <button id="btn-languages"
                    class="section-btn px-6 py-2 rounded-lg font-semibold bg-blue-600 text-white shadow hover:bg-blue-700 transition"
                    data-section="languages">Programming Languages</button>
                <button id="btn-libraries"
                    class="section-btn px-6 py-2 rounded-lg font-semibold bg-purple-600 text-white shadow hover:bg-purple-700 transition"
                    data-section="libraries">Libraries / Version Control</button>
                <button id="btn-social"
                    class="section-btn px-6 py-2 rounded-lg font-semibold bg-pink-600 text-white shadow hover:bg-pink-700 transition"
                    data-section="social">Social Media</button>
            </div>

            <!-- Section Contents (Skills Breakdown) -->
            <x-skills-breakdown />
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var photo = document.getElementById('about-photo');
        if (!photo) return;
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    photo.classList.add('animate__animated', 'animate__fadeInBottomRight');
                    photo.style.opacity = 1;
                    observer.disconnect();
                }
            });
        }, {
            threshold: 0.5
        });
        observer.observe(photo);

        // FadeInLeft animation
        var grids = document.querySelectorAll('#fade-animationLeft');
        grids.forEach(function(grid) {
            if (!grid) return;
            var animated = false;
            var skillObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting && !animated) {
                        grid.classList.add('animate__animated', 'animate__fadeInLeft');
                        animated = true;
                        skillObserver.disconnect();
                    }
                });
            }, {
                threshold: 0.3
            });
            skillObserver.observe(grid);
        });
    });
</script>
