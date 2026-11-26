<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['username' => 'admin'], ['password' => '12345678']);
        if (Estudiante::count() === 0) {
            Estudiante::factory()->count(10)->create();
        }
    }
}
