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
                ['name' => 'Python', 'icon' => 'devicon-python-plain'],
                ['name' => 'TypeScript', 'icon' => 'devicon-typescript-plain'],
                ['name' => 'JavaScript', 'icon' => 'devicon-javascript-plain'],
            ],
            'Backend & APIs' => [
                ['name' => 'Laravel', 'icon' => 'devicon-laravel-plain'],
                ['name' => 'RESTful APIs', 'icon' => 'icons.skills.api'],
                ['name' => 'GraphQL', 'icon' => 'devicon-graphql-plain'],
                ['name' => 'Microservices', 'icon' => 'icons.skills.api'],
                ['name' => 'Swagger / OpenAPI', 'icon' => 'devicon-swagger-plain'],
            ],
            'Frontend' => [
                ['name' => 'Vue.js', 'icon' => 'devicon-vuejs-plain'],
                ['name' => 'Tailwind CSS', 'icon' => 'devicon-tailwindcss-plain'],
                ['name' => 'Bootstrap', 'icon' => 'devicon-bootstrap-plain'],
            ],
            'Databases' => [
                ['name' => 'MySQL', 'icon' => 'devicon-mysql-plain-wordmark'],
                ['name' => 'PostgreSQL', 'icon' => 'devicon-postgresql-plain'],
                ['name' => 'Redis', 'icon' => 'devicon-redis-plain'],
                ['name' => 'MariaDB', 'icon' => 'devicon-mariadb-plain'],
                ['name' => 'MongoDB', 'icon' => 'devicon-mongodb-plain'],
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
                ['name' => 'TDD', 'icon' => 'icons.skills.concept'],
                ['name' => 'SOLID', 'icon' => 'icons.skills.concept'],
                ['name' => 'Clean Architecture', 'icon' => 'icons.skills.concept'],
                ['name' => 'ETLs', 'icon' => 'icons.skills.etl'],
                ['name' => 'Data Quality', 'icon' => 'icons.skills.data-quality'],
                ['name' => 'Data Migration', 'icon' => 'icons.skills.data-migration'],
                ['name' => 'Agile (Scrum/Kanban)', 'icon' => 'icons.skills.agile'],
            ],
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.skills-section');
    }
}