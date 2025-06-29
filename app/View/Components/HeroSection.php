<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroSection extends Component
{
    public string $name;

    public string $title;

    public string $linkedinUrl;

    public string $githubUrl;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->name = 'Davi Oliveira';
        $this->title = __('portfolio.hero_title');
        $this->linkedinUrl = 'https://www.linkedin.com/in/davio-vieira';
        $this->githubUrl = 'https://github.com/oPaozinh0';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-section');
    }
}
