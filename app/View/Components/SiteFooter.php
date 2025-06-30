<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteFooter extends Component
{
    public string $email;

    public string $whatsappNumber;

    public string $currentYear;

    public function __construct()
    {
        $this->email = 'davioliveira353.do@gmail.com';
        $this->whatsappNumber = '5518998268057'; // Use o formato internacional sem símbolos
        $this->currentYear = date('Y');
    }

    public function render(): View|Closure|string
    {
        return view('components.site-footer');
    }
}
