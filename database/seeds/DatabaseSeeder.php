<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Usuario admin 
        $this->call(UsersTableSeeder::class);

        // Tipos incidencias
        $this->call(TypesTableSeeder::class);

        // Medios de pago
        $this->call(MediosPagoTableSeeder::class);
    }
}
