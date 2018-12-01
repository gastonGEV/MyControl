<?php

use Illuminate\Database\Seeder;
use MyControl\Medio_pago;

class MediosPagoTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $medio_pago_efectivo = new Medio_pago();
    $medio_pago_efectivo->nombre = 'Efectivo';
    $medio_pago_efectivo->save();

    $medio_pago_tarjeta = new Medio_pago();
    $medio_pago_tarjeta->nombre = 'Tarjeta de credito';
    $medio_pago_tarjeta->save();
  }
}