<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SkillsSection extends Component
{
    /**
     * The array of skills.
     *
     * @var array
     */
    public array $skills;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->skills = [
            'PHP', // [cite: 11]
            'Laravel', // [cite: 7, 11]
            'MySQL', // [cite: 8, 11]
            'MariaDB', // [cite: 11]
            'MongoDB', // [cite: 11]
            'TypeScript', // [cite: 9]
            'ETLs', // [cite: 11]
            'Data Quality', // [cite: 11]
            'Data Migration' // [cite: 26]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.skills-section');
    }
}