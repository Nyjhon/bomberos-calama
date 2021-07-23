<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('slug');
            $table->string('codigo')->unique();
            $table->date('fecha_ing');
            $table->date('fecha_alt')->nullable();
            $table->string('estado');
            $table->text('descripcion');
            $table->string('nombre_res');
            $table->string('imagen_act');
            $table->string('file_path');
            $table->string('procedencia');
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
        Schema::dropIfExists('activos');
    }
}
