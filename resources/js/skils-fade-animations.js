document.addEventListener('DOMContentLoaded', function () {
    var grids = document.querySelectorAll('#skills-grid');
    grids.forEach(function (grid) {
        if (!grid) return;
        var animated = false;
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !animated) {
                    grid.classList.add('animate__animated', 'animate__fadeInLeft');
                    animated = true;
                    observer.disconnect();
                }
            });
        }, {
            threshold: 0.3
        });
        observer.observe(grid);
    });
});
