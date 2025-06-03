<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Solo ejecutar seeder de ejercicios (lenguajes y niveles ya existen)
        $this->call([
            ExerciseSeeder::class,
        ]);
    }
}
