<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SkillCard extends Component
{
    public string $name;
    public string $icon;
    public string $color;
    public string $bg;
    public string $border;
    public array $stroke;
    public int $target;
    public string $desc;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $icon,
        string $color,
        string $bg,
        string $border,
        array $stroke,
        int $target,
        string $desc
    ) {
        $this->name = $name;
        $this->icon = $icon;
        $this->color = $color;
        $this->bg = $bg;
        $this->border = $border;
        $this->stroke = $stroke;
        $this->target = $target;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.skill-card');
    }
}
