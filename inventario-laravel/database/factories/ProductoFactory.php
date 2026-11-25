<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class ProductoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => 'PROD-'.fake()->unique()->numerify('######'),
            'nombre' => fake()->words(3, true),
            'precio' => fake()->randomFloat(2, 1, 999),
            'existencias' => fake()->numberBetween(0, 100),
        ];
    }
}
