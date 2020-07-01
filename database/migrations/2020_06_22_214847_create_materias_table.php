<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();

            $table->string('ci');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            //$table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });

        Schema::create('materias', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('turno');
            $table->string('fecha_inicio');
            $table->string('fecha_final');
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->foreign('docente_id')->references('id')->on('docentes');
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
        Schema::dropIfExists('materias');
    }
}
