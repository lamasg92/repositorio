<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_carrera', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->unsignedBigInteger('carrera_id');
            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->integer('anio');
            $table->enum('estado', ['activo','inactivo'])->default('activo');
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
        Schema::dropIfExists('materia_carrera');
    }
}
