<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LanguageLevel;
use App\Models\ProgrammingLanguage;

class LanguageLevelSeeder extends Seeder
{
    public function run(): void
    {
        $javascript = ProgrammingLanguage::where('slug', 'javascript')->first();
        $python = ProgrammingLanguage::where('slug', 'python')->first();
        $java = ProgrammingLanguage::where('slug', 'java')->first();

        $levels = [
            // JavaScript levels
            [
                'programming_language_id' => $javascript->id,
                'name' => 'Básico',
                'slug' => 'basico',
                'description' => 'Nivel básico de JavaScript',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javascript->id,
                'name' => 'Intermedio',
                'slug' => 'intermedio',
                'description' => 'Nivel intermedio de JavaScript',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javascript->id,
                'name' => 'Avanzado',
                'slug' => 'avanzado',
                'description' => 'Nivel avanzado de JavaScript',
                'is_active' => true
            ],
            // Python levels
            [
                'programming_language_id' => $python->id,
                'name' => 'Básico',
                'slug' => 'basico',
                'description' => 'Nivel básico de Python',
                'is_active' => true
            ],
            [
                'programming_language_id' => $python->id,
                'name' => 'Intermedio',
                'slug' => 'intermedio',
                'description' => 'Nivel intermedio de Python',
                'is_active' => true
            ],
            [
                'programming_language_id' => $python->id,
                'name' => 'Avanzado',
                'slug' => 'avanzado',
                'description' => 'Nivel avanzado de Python',
                'is_active' => true
            ],
            // Java levels
            [
                'programming_language_id' => $java->id,
                'name' => 'Básico',
                'slug' => 'basico',
                'description' => 'Nivel básico de Java',
                'is_active' => true
            ],
            [
                'programming_language_id' => $java->id,
                'name' => 'Intermedio',
                'slug' => 'intermedio',
                'description' => 'Nivel intermedio de Java',
                'is_active' => true
            ],
            [
                'programming_language_id' => $java->id,
                'name' => 'Avanzado',
                'slug' => 'avanzado',
                'description' => 'Nivel avanzado de Java',
                'is_active' => true
            ]
        ];

        foreach ($levels as $level) {
            LanguageLevel::firstOrCreate(
                [
                    'programming_language_id' => $level['programming_language_id'],
                    'slug' => $level['slug']
                ],
                $level
            );
        }
    }
}