<?php

namespace Database\Seeders;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['username' => 'admin'], ['password' => '12345678']);

        foreach (Libro::factory()->count(10)->make() as $indice => $libro) {
            Libro::firstOrCreate(
                ['codigo' => sprintf('LIB-DEMO-%03d', $indice + 1)],
                $libro->only(['titulo', 'autor', 'anio_publicacion']),
            );
        }
    }
}
