<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuxiliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auxilios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_aux');
            $table->string('hora_aux');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('zona');
            $table->string('calle');
            $table->string('coordenadas');
            $table->string('unidad');
            $table->string('nombre_apellido')->nullable();
            $table->string('cedula')->nullable();
            $table->string('nacido_en')->nullable();
            $table->string('nacionalidad');
            $table->string('edad')->nullable();
            $table->string('genero');
            $table->string('temperancia')->nullable();
            $table->string('capacidad_dif')->nullable();
            $table->string('auxilios');
            $table->string('remitido_lugar');
            $table->string('nombre_policia');
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
        Schema::dropIfExists('auxilios');
    }
}
