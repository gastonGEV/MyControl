<?php

use Illuminate\Database\Seeder;
use MyControl\Tipo_incidencia;

class TypesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $tipo_ingreso = new Tipo_incidencia();
    $tipo_ingreso->nombre = 'Ingreso';
    $tipo_ingreso->save();

    $tipo_gasto = new Tipo_incidencia();
    $tipo_gasto->nombre = 'Gasto';
    $tipo_gasto->save();
  }
}