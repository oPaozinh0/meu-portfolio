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
            'PHP',
            'Laravel',
            'MySQL',
            'MariaDB',
            'MongoDB',
            'TypeScript', 
            'ETLs',
            'Data Quality',
            'Data Migration'
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