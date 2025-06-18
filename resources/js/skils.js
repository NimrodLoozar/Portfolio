document.addEventListener('DOMContentLoaded', function () {

    // Add active class toggle for section buttons
    const sectionBtns = document.querySelectorAll('.section-btn');

    function setActiveBtn(section) {
        sectionBtns.forEach(btn => {
            if (btn.dataset.section === section) {
                btn.classList.add('active', 'ring-4', 'ring-offset-2', 'ring-' + btn.className
                    .match(/bg-(\w+)-600/)[1] + '-300');
            } else {
                btn.classList.remove('active', 'ring-4', 'ring-offset-2', 'ring-blue-300',
                    'ring-purple-300', 'ring-pink-300');
            }
        });
    }

    // Initial active state
    setActiveBtn('languages');

    // Patch: Remove all 'active' classes on click, then set the correct one
    sectionBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            setActiveBtn(this.dataset.section);
            showSection(this.dataset.section);
        });
    });

});

// Animate circular progress for visible skill cards
function animateSkillProgress(skillsGrid) {
    const skillCards = skillsGrid.querySelectorAll('.skill-card');
    skillCards.forEach((card, index) => {
        const progressPath = card.querySelector('.progress-path');
        const progressText = card.querySelector('.progress-text');
        const target = parseInt(progressPath.getAttribute('data-target'));
        let currentProgress = 0;
        const duration = 1200;
        const steps = 40;
        const increment = target / steps;
        const stepTime = duration / steps;
        progressPath.style.strokeDasharray = `0, 100`;
        progressText.textContent = '0%';
        setTimeout(() => {
            const timer = setInterval(() => {
                currentProgress += increment;
                if (currentProgress >= target) {
                    currentProgress = target;
                    clearInterval(timer);
                }
                progressPath.style.strokeDasharray = `${currentProgress}, 100`;
                progressText.textContent = Math.round(currentProgress) + '%';
            }, stepTime);
        }, index * 60);
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const sections = ['languages', 'libraries', 'social'];
    let current = 'languages';

    function showSection(section) {
        if (section === current) return;
        const currentEl = document.getElementById('section-' + current);
        const nextEl = document.getElementById('section-' + section);

        // Fade out current
        currentEl.classList.remove('fade-in');
        currentEl.classList.add('fade-out');
        setTimeout(() => {
            currentEl.classList.add('hidden');
            nextEl.classList.remove('hidden');
            nextEl.classList.add('fade-in');
            nextEl.classList.remove('fade-out');
            current = section;
            // Animate progress for new section
            const skillsGrid = nextEl.querySelector('.skillsGrid');
            if (skillsGrid) animateSkillProgress(skillsGrid);
        }, 200);
    }

    document.querySelectorAll('.section-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            showSection(this.dataset.section);
        });
    });

    // Set initial state and animate first group
    document.getElementById('section-languages').classList.add('fade-in');
    animateSkillProgress(document.querySelector('#section-languages .skillsGrid'));
});

const ctx = document.getElementById('skillsChart').getContext('2d');

const skillsChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['HTML', 'CSS', 'PHP', 'Laravel', 'JavaScript', 'MySQL', 'React', 'Power BI'],
        datasets: [{
            label: 'Proficiency Level (%)',
            data: [90, 85, 80, 75, 70, 75, 60, 65],
            backgroundColor: [
                'rgba(255, 159, 64, 0.7)', // Orange for HTML
                'rgba(54, 162, 235, 0.7)', // Blue for CSS
                'rgba(153, 102, 255, 0.7)', // Purple for PHP
                'rgba(255, 99, 132, 0.7)', // Red for Laravel
                'rgba(255, 205, 86, 0.7)', // Yellow for JavaScript
                'rgba(75, 192, 192, 0.7)', // Green for MySQL
                'rgba(54, 162, 235, 0.7)', // Cyan for React
                'rgba(153, 102, 255, 0.7)' // Indigo for Power BI
            ],
            borderColor: [
                'rgb(255, 159, 64)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(255, 99, 132)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                ticks: {
                    callback: function (value) {
                        return value + '%';
                    }
                }
            }
        },
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                callbacks: {
                    label: function (context) {
                        return context.parsed.y + '%';
                    }
                }
            }
        }
    }
});

// Update chart colors based on theme changes
window.addEventListener('theme-changed', function (e) {
    if (typeof skillsChart !== 'undefined') {
        const isDark = e.detail.theme === 'dark';
        skillsChart.options.scales.x.ticks.color = isDark ? '#e5e7eb' : '#374151';
        skillsChart.options.scales.y.ticks.color = isDark ? '#e5e7eb' : '#374151';
        skillsChart.options.scales.x.grid.color = isDark ? '#374151' : '#e5e7eb';
        skillsChart.options.scales.y.grid.color = isDark ? '#374151' : '#e5e7eb';
        skillsChart.update();
    }
});