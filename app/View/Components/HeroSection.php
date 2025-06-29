<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroSection extends Component
{
    public string $name;
    public string $title;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->name = 'Davi Oliveira';
        $this->title = 'Senior Fullstack Developer specializing in crafting robust and scalable web applications with Laravel & Vue.js.';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-section');
    }
}