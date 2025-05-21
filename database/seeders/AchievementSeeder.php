<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Logros basados en ejercicios completados
        $exerciseAchievements = [
            [
                'name' => 'Primer Ejercicio',
                'description' => '¡Has completado tu primer ejercicio!',
                'type' => 'exercises',
                'threshold' => 1,
                'icon' => 'award-star'
            ],
            [
                'name' => 'Aprendiz',
                'description' => 'Has completado 5 ejercicios',
                'type' => 'exercises',
                'threshold' => 5,
                'icon' => 'code-bracket'
            ],
            [
                'name' => 'Estudiante Dedicado',
                'description' => 'Has completado 10 ejercicios',
                'type' => 'exercises',
                'threshold' => 10,
                'icon' => 'book-open'
            ],
            [
                'name' => 'Desarrollador Junior',
                'description' => 'Has completado 25 ejercicios',
                'type' => 'exercises',
                'threshold' => 25,
                'icon' => 'computer'
            ],
            [
                'name' => 'Desarrollador Senior',
                'description' => 'Has completado 50 ejercicios',
                'type' => 'exercises',
                'threshold' => 50,
                'icon' => 'cpu'
            ],
            [
                'name' => 'Maestro del Código',
                'description' => 'Has completado 100 ejercicios',
                'type' => 'exercises',
                'threshold' => 100,
                'icon' => 'trophy'
            ],
        ];

        // Logros basados en puntos acumulados
        $pointsAchievements = [
            [
                'name' => 'Primeros Puntos',
                'description' => 'Has ganado tus primeros 100 puntos',
                'type' => 'points',
                'threshold' => 100,
                'icon' => 'coin'
            ],
            [
                'name' => 'Acumulando Puntos',
                'description' => 'Has acumulado 500 puntos',
                'type' => 'points',
                'threshold' => 500,
                'icon' => 'coins'
            ],
            [
                'name' => 'Estrella Ascendente',
                'description' => 'Has acumulado 1.000 puntos',
                'type' => 'points',
                'threshold' => 1000,
                'icon' => 'star'
            ],
            [
                'name' => 'Experto en Puntuación',
                'description' => 'Has acumulado 2.500 puntos',
                'type' => 'points',
                'threshold' => 2500,
                'icon' => 'chart-bar'
            ],
            [
                'name' => 'Virtuoso del Teclado',
                'description' => 'Has acumulado 5.000 puntos',
                'type' => 'points',
                'threshold' => 5000,
                'icon' => 'keyboard'
            ],
            [
                'name' => 'Leyenda de la Programación',
                'description' => 'Has acumulado 10.000 puntos',
                'type' => 'points',
                'threshold' => 10000,
                'icon' => 'fire'
            ],
        ];

        // Insertar todos los logros
        foreach (array_merge($exerciseAchievements, $pointsAchievements) as $achievement) {
            Achievement::create($achievement);
        }
    }
}
