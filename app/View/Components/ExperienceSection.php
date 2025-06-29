<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExperienceSection extends Component
{
    /**
     * The professional experiences array.
     */
    public array $experiences;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->experiences = config('portfolio.experiences');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.experience-section');
    }
}
