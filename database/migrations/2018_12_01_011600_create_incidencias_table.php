<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('desc')->nullable();
            $table->unsignedInteger('tipo_incidencia_id')->nullable();
            $table->foreign('tipo_incidencia_id')->references('id')->on('tipo_incidencias');
            $table->unsignedInteger('medio_pago_id')->nullable();
            $table->foreign('medio_pago_id')->references('id')->on('medio_pagos');
            $table->unsignedInteger('monto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
