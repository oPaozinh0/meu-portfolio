<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteFooter extends Component
{
    public string $phone;
    public string $email;
    public string $linkedinUrl;
    public string $currentYear;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->phone = '18998268057';
        $this->email = 'davioliveira353.do@gmail.com';
        $this->linkedinUrl = 'https://www.linkedin.com/in/davio-vieira';
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