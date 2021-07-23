<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraordinariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extraordinarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_ext');
            $table->string('hora_ext');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('zona')->nullable();
            $table->string('calle')->nullable();
            $table->string('coordenadas');
            $table->string('unidad')->nullable();
            $table->string('tipo');
            $table->bigInteger('evento');
            $table->bigInteger('desplegados');
            $table->string('remitido')->nullable();
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
        Schema::dropIfExists('extraordinarios');
    }
}
