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

        //incidencias user Admin
        factory(MyControl\Incidencia::class, 10)->create(['tipo_incidencia_id' => 1, 'medio_pago_id' => 1, 'user_id' => 1]);
        factory(MyControl\Incidencia::class, 10)->create(['tipo_incidencia_id' => 2, 'medio_pago_id' => 1, 'user_id' => 1]);

        //incidencias user Test
        factory(MyControl\Incidencia::class, 10)->create(['tipo_incidencia_id' => 1, 'medio_pago_id' => 1, 'user_id' => 2]);
        factory(MyControl\Incidencia::class, 10)->create(['tipo_incidencia_id' => 2, 'medio_pago_id' => 1, 'user_id' => 2]);
    }
}
