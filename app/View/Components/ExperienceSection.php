<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExperienceSection extends Component
{
    /**
     * The professional experiences array.
     *
     * @var array
     */
    public array $experiences;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->experiences = [
            [
                'role' => 'Fullstack Developer', //
                'company' => 'Amplimed', //
                'period' => 'May 2025 - Present', //
                'location' => 'Chapecó, Santa Catarina, Brazil', //
                'description' => [],
            ],
            [
                'role' => 'Data Quality Developer', //
                'company' => 'Amplimed', //
                'period' => 'July 2024 - May 2025 (11 months)', //
                'location' => 'Chapecó, Santa Catarina, Brazil', //
                'description' => [
                    "Focused on the analysis and development of solutions to ensure data quality, integrity, and consistency.", //
                    "Automated audit processes and the correction of anomalies, collaborating with engineering and analytics teams to continuously improve data flows." //
                ],
            ],
            [
                'role' => 'Data Migration Analyst', //
                'company' => 'Amplimed', //
                'period' => 'September 2022 - July 2024 (1 year 11 months)', //
                'location' => 'Chapecó, Santa Catarina, Brazil', //
                'description' => [
                    "Responsible for data analysis and creating scripts for migrating data from the legacy system to Amplimed." //
                ],
            ],
            [
                'role' => 'IT Support Technician (Helpdesk)', //
                'company' => 'Amplimed', //
                'period' => 'October 2021 - September 2022 (1 year)', //
                'location' => 'Chapecó, Santa Catarina, Brazil', //
                'description' => [
                    "Provided client support.", //
                    "Assisted clients to ensure flawless clinic management." //
                ],
            ],
            [
                'role' => 'IT Support Technician (Helpdesk)', //
                'company' => 'FX Sistemas', //
                'period' => 'May 2020 - October 2021 (1 year 6 months)', //
                'location' => 'Mirandópolis, São Paulo, Brazil', //
                'description' => [
                    "Provided client support.", //
                    "Responsible for module installation and maintenance." //
                ],
            ],
            [
                'role' => 'IT Support Technician (Helpdesk)', //
                'company' => 'Netbil Educacional', //
                'period' => 'April 2018 - December 2019 (1 year 9 months)', //
                'location' => 'Mirandópolis, São Paulo, Brasil', //
                'description' => [
                    "Conducted educational software activities in the computer lab.", //
                    "Introduced children to the technological environment." //
                ],
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.experience-section');
    }
}