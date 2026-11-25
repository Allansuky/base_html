<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['username' => 'admin'], ['password' => '12345678']);
        if (Producto::count() === 0) {
            Producto::factory()->count(10)->create();
        }
    }
}
