<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SkillsSection extends Component
{
    /**
     * @var array<string, array<int, array<string, string>>>
     */
    public array $skillCategories;

    public function __construct()
    {
        $this->skillCategories = [
            'Languages' => [
                ['name' => 'PHP', 'icon' => 'devicon-php-plain'],
                ['name' => 'TypeScript', 'icon' => 'devicon-typescript-plain'],
                ['name' => 'JavaScript', 'icon' => 'devicon-javascript-plain'],
                ['name' => 'Python', 'icon' => 'devicon-python-plain'],
            ],
            'Frameworks' => [
                ['name' => 'Laravel', 'icon' => 'devicon-laravel-plain'],
                ['name' => 'Vue.js', 'icon' => 'devicon-vuejs-plain'],
                ['name' => 'Tailwind CSS', 'icon' => 'devicon-tailwindcss-plain'],
                ['name' => 'Bootstrap', 'icon' => 'devicon-bootstrap-plain'],
            ],
            'Databases' => [
                ['name' => 'MySQL', 'icon' => 'devicon-mysql-plain-wordmark'],
                ['name' => 'PostgreSQL', 'icon' => 'devicon-postgresql-plain'],
                ['name' => 'MariaDB', 'icon' => 'devicon-mariadb-plain'],
                ['name' => 'MongoDB', 'icon' => 'devicon-mongodb-plain'],
            ],
            'DevOps & Tools' => [
                ['name' => 'Git', 'icon' => 'devicon-git-plain'],
                ['name' => 'Docker', 'icon' => 'devicon-docker-plain'],
                ['name' => 'Kubernetes', 'icon' => 'devicon-kubernetes-plain'],
                ['name' => 'Datadog', 'icon' => 'icons.skills.datadog'],
                
            ],
            'Concepts' => [
                ['name' => 'ETLs', 'icon' => 'fa-solid fa-shuffle'], 
                ['name' => 'Data Quality', 'icon' => 'fa-solid fa-check-double'], 
                ['name' => 'Data Migration', 'icon' => 'fa-solid fa-database'], 
                ['name' => 'Agile Methodology', 'icon' => 'fa-solid fa-arrows-split-up-and-left']
            ],
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.skills-section');
    }
}