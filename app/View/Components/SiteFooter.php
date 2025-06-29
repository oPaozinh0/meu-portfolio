<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteFooter extends Component
{
    public string $email;

    public string $currentYear;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->email = 'davioliveira353.do@gmail.com';
        $this->currentYear = date('Y');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.site-footer');
    }
}
