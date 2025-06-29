<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EducationSection extends Component
{
    /**
     * The education history array.
     */
    public array $education;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->education = config('portfolio.education');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.education-section');
    }
}
