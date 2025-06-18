<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SkillsBreakdown extends Component
{
    public array $skillsLanguages;
    public array $skillsLibraries;
    public array $skillsSocial;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->skillsLanguages = [
            [
                'name' => 'HTML',
                'icon' => 'img/html-1.svg',
                'color' => 'orange',
                'bg' => 'from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20',
                'border' => 'border-orange-200 dark:border-orange-700',
                'stroke' => ['#fed7aa', '#f97316'],
                'target' => 90,
                'desc' => 'Semantic markup & structure',
            ],
            [
                'name' => 'CSS',
                'icon' => 'img/css-3.svg',
                'color' => 'blue',
                'bg' => 'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20',
                'border' => 'border-blue-200 dark:border-blue-700',
                'stroke' => ['#93c5fd', '#3b82f6'],
                'target' => 85,
                'desc' => 'Responsive design & animations',
            ],
            [
                'name' => 'JavaScript',
                'icon' => 'img/javascript-1.svg',
                'color' => 'yellow',
                'bg' => 'from-yellow-50 to-yellow-100 dark:from-yellow-900/20 dark:to-yellow-800/20',
                'border' => 'border-yellow-200 dark:border-yellow-700',
                'stroke' => ['#fde047', '#eab308'],
                'target' => 70,
                'desc' => 'Interactive web applications',
            ],
            [
                'name' => 'PHP',
                'icon' => 'img/php-4.svg',
                'color' => 'purple',
                'bg' => 'from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20',
                'border' => 'border-purple-200 dark:border-purple-700',
                'stroke' => ['#c4b5fd', '#8b5cf6'],
                'target' => 80,
                'desc' => 'Server-side development',
            ],
            [
                'name' => 'MYSQL',
                'icon' => 'img/mysql-logo-pure.svg',
                'color' => 'blue',
                'bg' => 'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20',
                'border' => 'border-blue-200 dark:border-blue-700',
                'stroke' => ['#93c5fd', '#2563eb'],
                'target' => 75,
                'desc' => 'Database management',
            ],
        ];

        $this->skillsLibraries = [
            [
                'name' => 'Laravel',
                'icon' => 'img/laravel-2.svg',
                'color' => 'red',
                'bg' => 'from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20',
                'border' => 'border-red-200 dark:border-red-700',
                'stroke' => ['#fca5a5', '#ef4444'],
                'target' => 75,
                'desc' => 'MVC framework & APIs',
            ],
            [
                'name' => 'React',
                'icon' => 'img/react-2.svg',
                'color' => 'cyan',
                'bg' => 'from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20',
                'border' => 'border-cyan-200 dark:border-cyan-700',
                'stroke' => ['#67e8f9', '#06b6d4'],
                'target' => 60,
                'desc' => 'Component-based development',
            ],
            [
                'name' => 'Vue.js',
                'icon' => 'img/vue-9.svg',
                'color' => 'emerald',
                'bg' => 'from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20',
                'border' => 'border-emerald-200 dark:border-emerald-700',
                'stroke' => ['#6ee7b7', '#10b981'],
                'target' => 65,
                'desc' => 'Progressive JavaScript framework',
            ],
            [
                'name' => 'Tailwind',
                'icon' => 'img/tailwind-css-2.svg',
                'color' => 'cyan',
                'bg' => 'from-cyan-50 to-cyan-100 dark:from-cyan-900/20 dark:to-cyan-800/20',
                'border' => 'border-cyan-200 dark:border-cyan-700',
                'stroke' => ['#67e8f9', '#06b6d4'],
                'target' => 90,
                'desc' => 'Utility-first CSS framework',
            ],
            [
                'name' => 'Git',
                'icon' => 'img/github-icon-1.svg',
                'color' => 'slate',
                'bg' => 'from-slate-50 to-slate-100 dark:from-slate-900/20 dark:to-slate-800/20',
                'border' => 'border-slate-200 dark:border-slate-700',
                'stroke' => ['#cbd5e1', '#64748b'],
                'target' => 80,
                'desc' => 'Version control system',
            ],
            [
                'name' => 'Docker',
                'icon' => 'img/docker.svg',
                'color' => 'sky',
                'bg' => 'from-sky-50 to-sky-100 dark:from-sky-900/20 dark:to-sky-800/20',
                'border' => 'border-sky-200 dark:border-sky-700',
                'stroke' => ['#7dd3fc', '#0ea5e9'],
                'target' => 55,
                'desc' => 'Containerization platform',
            ],
            [
                'name' => 'jQuery',
                'icon' => 'img/jquery-4.svg',
                'color' => 'amber',
                'bg' => 'from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20',
                'border' => 'border-amber-200 dark:border-amber-700',
                'stroke' => ['#fcd34d', '#f59e0b'],
                'target' => 75,
                'desc' => 'JavaScript library',
            ],
            [
                'name' => 'Vite.js',
                'icon' => 'img/vitejs.svg',
                'color' => 'violet',
                'bg' => 'from-violet-50 to-violet-100 dark:from-violet-900/20 dark:to-violet-800/20',
                'border' => 'border-violet-200 dark:border-violet-700',
                'stroke' => ['#c4b5fd', '#8b5cf6'],
                'target' => 75,
                'desc' => 'Build tool & dev server',
            ],
            [
                'name' => 'Blade',
                'icon' => 'img/blade-ui-kit.svg',
                'color' => 'rose',
                'bg' => 'from-rose-50 to-rose-100 dark:from-rose-900/20 dark:to-rose-800/20',
                'border' => 'border-rose-200 dark:border-rose-700',
                'stroke' => ['#fda4af', '#f43f5e'],
                'target' => 85,
                'desc' => 'Laravel templating engine',
            ],
            [
                'name' => 'WordPress',
                'icon' => 'img/wordpress-icon-1.svg',
                'color' => 'stone',
                'bg' => 'from-stone-50 to-stone-100 dark:from-stone-900/20 dark:to-stone-800/20',
                'border' => 'border-stone-200 dark:border-stone-700',
                'stroke' => ['#d6d3d1', '#78716c'],
                'target' => 70,
                'desc' => 'Content management system',
            ],
            [
                'name' => 'Chart.js',
                'icon' => 'img/chart_js_favicon.ico',
                'color' => 'teal',
                'bg' => 'from-teal-50 to-teal-100 dark:from-teal-900/20 dark:to-teal-800/20',
                'border' => 'border-teal-200 dark:border-teal-700',
                'stroke' => ['#5eead4', '#14b8a6'],
                'target' => 70,
                'desc' => 'Interactive data visualization',
            ],
        ];

        $this->skillsSocial = [
            [
                'name' => 'Facebook',
                'icon' => 'img/facebook-3-2.svg',
                'color' => 'blue',
                'bg' => 'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20',
                'border' => 'border-blue-200 dark:border-blue-700',
                'stroke' => ['#93c5fd', '#2563eb'],
                'target' => 85,
                'desc' => 'Social media platform',
            ],
            [
                'name' => 'Instagram',
                'icon' => 'img/instagram-2016-5.svg',
                'color' => 'pink',
                'bg' => 'from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20',
                'border' => 'border-pink-200 dark:border-pink-700',
                'stroke' => ['#f9a8d4', '#ec4899'],
                'target' => 90,
                'desc' => 'Photo sharing platform',
            ],
            [
                'name' => 'LinkedIn',
                'icon' => 'img/linkedin-icon-2.svg',
                'color' => 'blue',
                'bg' => 'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20',
                'border' => 'border-blue-200 dark:border-blue-700',
                'stroke' => ['#93c5fd', '#1d4ed8'],
                'target' => 85,
                'desc' => 'Professional networking',
            ],
            [
                'name' => 'Gmail',
                'icon' => 'img/official-gmail-icon-2020-.svg',
                'color' => 'red',
                'bg' => 'from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20',
                'border' => 'border-red-200 dark:border-red-700',
                'stroke' => ['#fca5a5', '#dc2626'],
                'target' => 95,
                'desc' => 'Email service',
            ],
            [
                'name' => 'Threads',
                'icon' => 'img/threads-1.svg',
                'color' => 'gray',
                'bg' => 'from-gray-50 to-gray-100 dark:from-gray-900/20 dark:to-gray-800/20',
                'border' => 'border-gray-200 dark:border-gray-700',
                'stroke' => ['#d1d5db', '#4b5563'],
                'target' => 80,
                'desc' => 'Text-based social platform',
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.skills-breakdown');
    }
}
