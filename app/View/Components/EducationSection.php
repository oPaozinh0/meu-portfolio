<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EducationSection extends Component
{
    /**
     * The education history array.
     *
     * @var array
     */
    public array $education;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->education = [
            [
                'institution' => 'Centro Universitário Católico Salesiano Auxilium - UniSALESIANO',
                'degree' => 'Higher Diploma in Technology, Digital Game Development',
                'period' => 'February 2018 - December 2020',
                'location' => 'Araçatuba',
            ],
            [
                'institution' => 'ETEC - Escola Técnica Estadual de São Paulo',
                'degree' => 'Technical High School, Computer Technician',
                'period' => 'February 2015 - December 2017',
                'location' => 'São Paulo, Brazil',
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.education-section');
    }
}