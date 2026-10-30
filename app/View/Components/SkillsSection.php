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
                ['name' => 'PL/SQL & SQL', 'icon' => 'devicon-oracle-original'],
                ['name' => 'PHP', 'icon' => 'devicon-php-plain'],
                ['name' => 'Python', 'icon' => 'devicon-python-plain'],
                ['name' => 'TypeScript', 'icon' => 'devicon-typescript-plain'],
                ['name' => 'JavaScript', 'icon' => 'devicon-javascript-plain'],
            ],
            'Databases' => [
                ['name' => 'Oracle (PL/SQL)', 'icon' => 'devicon-oracle-original'],
                ['name' => 'PostgreSQL (PSql)', 'icon' => 'devicon-postgresql-plain'],
                ['name' => 'PostGIS / Geoespacial', 'icon' => 'icons.skills.geo'],
                ['name' => 'MySQL', 'icon' => 'devicon-mysql-plain-wordmark'],
                ['name' => 'Redis', 'icon' => 'devicon-redis-plain'],
                ['name' => 'MongoDB', 'icon' => 'devicon-mongodb-plain'],
            ],
            'Backend & APIs' => [
                ['name' => 'Laravel', 'icon' => 'devicon-laravel-plain'],
                ['name' => 'RESTful APIs', 'icon' => 'icons.skills.api'],
                ['name' => 'GraphQL', 'icon' => 'devicon-graphql-plain'],
                ['name' => 'Microservices', 'icon' => 'icons.skills.api'],
                ['name' => 'Swagger / OpenAPI', 'icon' => 'devicon-swagger-plain'],
            ],
            'Frontend' => [
                ['name' => 'Next.js & React', 'icon' => 'devicon-nextjs-plain'],
                ['name' => 'Vue.js', 'icon' => 'devicon-vuejs-plain'],
                ['name' => 'Tailwind CSS', 'icon' => 'devicon-tailwindcss-plain'],
                ['name' => 'Alpine.js', 'icon' => 'icons.skills.concept'],
            ],
            'DevOps & Tools' => [
                ['name' => 'Git', 'icon' => 'devicon-git-plain'],
                ['name' => 'Docker', 'icon' => 'devicon-docker-plain'],
                ['name' => 'Kubernetes', 'icon' => 'devicon-kubernetes-plain'],
                ['name' => 'GitHub Actions', 'icon' => 'devicon-githubactions-plain'],
                ['name' => 'Nginx', 'icon' => 'devicon-nginx-original'],
                ['name' => 'Linux', 'icon' => 'devicon-linux-plain'],
                ['name' => 'AWS', 'icon' => 'devicon-amazonwebservices-plain-wordmark'],
                ['name' => 'Datadog', 'icon' => 'icons.skills.datadog'],
            ],
            'Concepts' => [
                ['name' => 'Procedures ELT / ETL', 'icon' => 'icons.skills.etl'],
                ['name' => 'Bancos Geoespaciais', 'icon' => 'icons.skills.geo'],
                ['name' => 'Data Quality', 'icon' => 'icons.skills.data-quality'],
                ['name' => 'Data Migration', 'icon' => 'icons.skills.data-migration'],
                ['name' => 'Clean Architecture', 'icon' => 'icons.skills.concept'],
                ['name' => 'SOLID', 'icon' => 'icons.skills.concept'],
                ['name' => 'TDD', 'icon' => 'icons.skills.concept'],
                ['name' => 'Agile (Scrum/Kanban)', 'icon' => 'icons.skills.agile'],
            ],
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.skills-section');
    }
}