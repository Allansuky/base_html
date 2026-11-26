<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class EstudianteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero_cuenta' => fake()->unique()->numerify('2023########'),
            'nombre' => fake()->name(),
            'correo' => fake()->unique()->safeEmail(),
            'fecha_nacimiento' => fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
        ];
    }
}
