<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreparaduriaAsignaturasCursandoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparaduria_asignaturas_cursando', function (Blueprint $table) {
            $table->increments('id_preparaduria_asignaturas_cursando');
            $table->integer('id_preparaduria')->unsigned();
            $table->foreign('id_preparaduria')->references('id_preparaduria')->on('preparaduria')->onDelete('cascade');
            $table->integer('id_asignatura')->unsigned();
            $table->foreign('id_asignatura')->references('id_asignatura')->on('asignatura')->onDelete('cascade');
         
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
        Schema::dropIfExists('preparaduria_asignaturas_cursando');
    }
}
