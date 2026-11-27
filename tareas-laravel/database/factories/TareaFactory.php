<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class TareaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(4),
            'descripcion' => fake()->sentence(8),
            'responsable' => fake()->name(),
            'fecha_limite' => fake()->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d'),
            'estado' => fake()->randomElement(['pendiente', 'en proceso', 'completada']),
        ];
    }
}
