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
            'Backend' => [
                ['name' => 'PHP', 'icon' => 'devicon-php-plain'],
                ['name' => 'Laravel', 'icon' => 'devicon-laravel-plain'],
            ],
            'Frontend' => [
                ['name' => 'Vue.js', 'icon' => 'devicon-vuejs-plain'],
                ['name' => 'TypeScript', 'icon' => 'devicon-typescript-plain'],
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
            ],
            'Concepts' => [
                ['name' => 'ETLs', 'icon' => 'icons.skills.etl'],
                ['name' => 'Data Quality', 'icon' => 'icons.skills.data-quality'],
                ['name' => 'Data Migration', 'icon' => 'icons.skills.data-migration'],
            ],
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.skills-section');
    }
}
