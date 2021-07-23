<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->unique();
            $table->string('clase');
            $table->string('slug');
            $table->string('marca');
            $table->string('tipo');
            $table->bigInteger('año_modelo');
            $table->string('origen');
            $table->string('placa')->unique();
            $table->string('placa_gen')->unique()->nullable();
            $table->string('crpva')->nullable();
            $table->bigInteger('soat')->nullable();
            $table->bigInteger('b_sisa')->nullable();
            $table->string('chasis');
            $table->string('n_motor');
            $table->string('cilindrada')->nullable();
            $table->string('color');
            $table->bigInteger('n_ocupantes');
            $table->string('estado');
            $table->string('imagen_veh');
            $table->string('file_path');
            $table->string('des_unidad');
            $table->string('fuente_adq');
            $table->string('documento_res');
            $table->softDeletes();
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
