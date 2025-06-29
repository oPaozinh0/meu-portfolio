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
                'role' => 'Fullstack Developer',
                'company' => 'Amplimed',
                'period' => 'May 2025 - Present',
                'location' => 'Chapecó, Santa Catarina, Brazil',
                'description' => [
                    "As a Fullstack Developer for the 'Amplimed - Sistema para clínicas' SaaS platform, I am responsible for the end-to-end development of new features.", //
                    "Design and maintain robust backend functionalities using PHP and Laravel, focusing on performance and data security.", //
                    "Build intuitive and responsive user interfaces with Vue.js, ensuring a high-quality experience for healthcare professionals.", //
                    "Collaborate with product, design, and QA teams to transform business requirements into efficient technical solutions." //
                ],
            ],
            [
                'role' => 'Data Quality Developer',
                'company' => 'Amplimed',
                'period' => 'July 2024 - May 2025 (11 months)',
                'location' => 'Chapecó, Santa Catarina, Brazil',
                'description' => [
                    "Led the analysis and development of specialized solutions to ensure the quality, integrity, and consistency of critical data.", //
                    "Engineered and automated audit processes to detect and correct anomalies, significantly improving data reliability.", //
                    "Collaborated with engineering and analytics teams to continuously enhance data flows and processing pipelines." //
                ],
            ],
            [
                'role' => 'Data Migration Analyst',
                'company' => 'Amplimed',
                'period' => 'September 2022 - July 2024 (1 year 11 months)',
                'location' => 'Chapecó, Santa Catarina, Brazil',
                'description' => [
                    "Oversaw the complete data migration lifecycle, from analysis of legacy systems to the development of custom ETL scripts.", //
                    "Successfully migrated sensitive patient and clinical data to the Amplimed platform, ensuring zero data loss and maintaining integrity." //
                ],
            ],
            [
                'role' => 'IT Support Technician (Helpdesk)',
                'company' => 'Amplimed',
                'period' => 'October 2021 - September 2022 (1 year)',
                'location' => 'Chapecó, Santa Catarina, Brazil',
                'description' => [
                    "Provided specialized technical support for clients of the Amplimed system.", //
                    "Acted as a key resource in assisting clients with system configuration, ensuring flawless clinic management and user satisfaction." //
                ],
            ],
            [
                'role' => 'IT Support Technician (Helpdesk)',
                'company' => 'FX Sistemas',
                'period' => 'May 2020 - October 2021 (1 year 6 months)',
                'location' => 'Mirandópolis, São Paulo, Brazil',
                'description' => [
                    "Delivered technical support to a diverse client base.", //
                    "Managed the installation, configuration, and maintenance of various system modules." //
                ],
            ],
            [
                'role' => 'IT Support Technician (Helpdesk)',
                'company' => 'Netbil Educacional',
                'period' => 'April 2018 - December 2019 (1 year 9 months)',
                'location' => 'Mirandópolis, São Paulo, Brasil',
                'description' => [
                    "Facilitated educational software activities in computer labs for young students.", //
                    "Played a key role in introducing children to technology and digital literacy." //
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