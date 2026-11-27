<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Tarea;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['username' => 'admin'], ['password' => '12345678']);
        if (Tarea::count() === 0) {
            Tarea::factory()->count(10)->create();
        }
    }
}
