<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => 'LIB-'.strtoupper(fake()->unique()->bothify('??-#####')),
            'titulo' => fake()->sentence(3),
            'autor' => fake()->name(),
            'anio_publicacion' => fake()->numberBetween(1450, now()->year),
        ];
    }
}
