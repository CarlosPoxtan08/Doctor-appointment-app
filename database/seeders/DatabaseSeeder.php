<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Llamar al seeder de roles
        $this->call([
            DatabaseSeeder::class,
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
