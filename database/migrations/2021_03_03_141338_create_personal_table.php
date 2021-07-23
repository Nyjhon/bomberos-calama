<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('nombres');
            $table->string('apellido_pat');
            $table->string('apellido_mat');
            $table->bigInteger('ci')->unique();
            $table->string('exp');
            $table->string('imagen_per');
            $table->string('file_path');
            $table->bigInteger('celular');
            $table->date('fecha_nac');
            $table->string('grado');
            $table->bigInteger('licencia');
            $table->bigInteger('seguro');
            $table->date('fecha_des');
            $table->date('fecha_alt')->nullable();
            $table->string('unidad_des');
            $table->string('cargo_act');
            $table->string('destino_ant');
            $table->string('numero_esc');
            $table->string('antiguedad_grado');
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
        Schema::dropIfExists('personal');
    }
}
