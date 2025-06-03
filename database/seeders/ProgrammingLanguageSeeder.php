<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgrammingLanguage;

class ProgrammingLanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'icon' => '🟨',
                'description' => 'Lenguaje de programación dinámico para web',
                'is_active' => true
            ],
            [
                'name' => 'Python',
                'slug' => 'python',
                'icon' => '🐍',
                'description' => 'Lenguaje de programación de alto nivel',
                'is_active' => true
            ],
            [
                'name' => 'Java',
                'slug' => 'java',
                'icon' => '☕',
                'description' => 'Lenguaje de programación orientado a objetos',
                'is_active' => true
            ]
        ];

        foreach ($languages as $language) {
            ProgrammingLanguage::firstOrCreate(
                ['slug' => $language['slug']],
                $language
            );
        }
    }
}