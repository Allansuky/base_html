<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Mascota;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['username' => 'admin'], ['password' => '12345678']);
        if (Mascota::count() === 0) {
            Mascota::factory()->count(10)->create();
        }
    }
}
