<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Llamar al seeder de roles
        $this->call([
            RoleSeeder::class
        ]);

        //Crear un usario de prueba
        //php artisan migrate:fresh --seed

        User::factory()->create([
            'name' => 'Rodrigo Gaxiola',
            'email' => 'rodrigo@software.edu.mx',
            'password' => bcrypt('12345678')
        ]);
    }
}
