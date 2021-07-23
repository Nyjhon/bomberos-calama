<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomberosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bomberos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_suc');
            $table->string('hora_suc');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('unidad');
            $table->string('zona');
            $table->string('calle');
            $table->string('coordenadas');
            $table->string('auxilios');
            $table->string('causa');
            $table->string('ocurrido');
            $table->string('remitido_lugar');
            $table->text('datos_victima')->nullable();
            $table->text('datos_arrestados')->nullable();
            $table->string('remitido_epi')->nullable();
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
        Schema::dropIfExists('bomberos');
    }
}
