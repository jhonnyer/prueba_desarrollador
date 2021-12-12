<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table-> increments('id_vehiculo');
            $table-> integer('id_propietario1')->unsigned();
            $table-> foreign('id_propietario1')->references('id_propietario')->on('propietarios');
            $table-> String('placa');
            $table-> String('marca');
            $table-> String('tipo_vehiculo');
            $table-> String('estado');
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
        Schema::dropIfExists('vehiculos');
    }
}
