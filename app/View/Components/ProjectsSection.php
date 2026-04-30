<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectsSection extends Component
{
    public array $projects;

    public function __construct()
    {
        $this->projects = config('portfolio.projects', []);
    }

    public function render(): View|Closure|string
    {
        return view('components.projects-section');
    }
}
