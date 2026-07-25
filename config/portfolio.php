<?php

return [
    'experiences' => [
        [
            'role' => 'role_0',
            'company' => 'Attrion',
            'website' => 'https://attrion.com.br',
            'period' => 'period_0',
            'location' => 'location_0',
            'current' => true,
            'description' => [
                'description_0_1',
                'description_0_2',
                'description_0_3',
            ],
        ],
        [
            'role' => 'role_1',
            'company' => 'Amplimed',
            'website' => 'https://amplimed.com.br',
            'period' => 'period_1',
            'location' => 'location_1',
            'description' => [
                'description_1_1',
                'description_1_2',
                'description_1_3',
                'description_1_4',
            ],
        ],
        [
            'role' => 'role_2',
            'company' => 'Amplimed',
            'website' => 'https://amplimed.com.br',
            'period' => 'period_2',
            'location' => 'location_2',
            'description' => [
                'description_2_1',
                'description_2_2',
                'description_2_3',
            ],
        ],
        [
            'role' => 'role_3',
            'company' => 'Amplimed',
            'website' => 'https://amplimed.com.br',
            'period' => 'period_3',
            'location' => 'location_3',
            'description' => [
                'description_3_1',
                'description_3_2',
            ],
        ],
        [
            'role' => 'role_4',
            'company' => 'Amplimed',
            'website' => 'https://amplimed.com.br',
            'period' => 'period_4',
            'location' => 'location_4',
            'description' => [
                'description_4_1',
                'description_4_2',
            ],
        ],
        [
            'role' => 'role_5',
            'company' => 'FX Sistemas',
            'website' => 'https://www.fxsistemas.com.br',
            'period' => 'period_5',
            'location' => 'location_5',
            'description' => [
                'description_5_1',
                'description_5_2',
            ],
        ],
        [
            'role' => 'role_6',
            'company' => 'Netbil Educacional',
            'website' => 'https://www.netbil.com.br',
            'period' => 'period_6',
            'location' => 'location_6',
            'description' => [
                'description_6_1',
                'description_6_2',
            ],
        ],
    ],
    'projects' => [
        [
            'key' => 'attrion',
            'name' => 'Attrion',
            'accent' => 'var(--pink)',
            'status' => 'production',
            'tags' => ['Laravel 12', 'PHP 8', 'MySQL', 'Redis', 'Reverb', 'Horizon', 'Tailwind', 'Pagar.me'],
            'links' => [
                ['label_key' => 'project_link_visit', 'url' => 'https://attrion.com.br', 'primary' => true],
            ],
        ],
        [
            'key' => 'shortener',
            'name' => 'Encurtador',
            'accent' => 'var(--cyan)',
            'status' => 'open_source',
            'tags' => ['Laravel 12', 'SQLite', 'Alpine.js', 'Tailwind v4', 'Vite'],
            'links' => [
                ['label_key' => 'project_link_demo', 'route' => 'shortlink.create', 'primary' => true],
                ['label_key' => 'project_link_github', 'url' => 'https://github.com/oPaozinh0/meu-portfolio'],
            ],
        ],
    ],

    'education' => [
        [
            'institution' => 'Faculdade Metropolitana do Estado de São Paulo',
            'degree' => 'degree_3',
            'period' => 'period_3',
            'location' => 'São Paulo, Brazil',
        ],
        [
            'institution' => 'Centro Universitário Católico Salesiano Auxilium - UniSALESIANO',
            'degree' => 'degree_1',
            'period' => 'period_1',
            'location' => 'Araçatuba',
        ],
        [
            'institution' => 'ETEC - Escola Técnica Estadual de São Paulo',
            'degree' => 'degree_2',
            'period' => 'period_2',
            'location' => 'São Paulo, Brazil',
        ],
    ],
];
