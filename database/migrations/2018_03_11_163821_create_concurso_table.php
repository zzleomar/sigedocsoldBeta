<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concurso', function (Blueprint $table) {
            $table->increments('id_concurso');
            $table->integer('id_estados')->unsigned();
            $table->foreign('id_estados')->references('id_estados')->on('estados')->onDelete('cascade');
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id_periodo')->on('periodo')->onDelete('cascade');
            $table->date('fecha_apertura');
            $table->date('fecha_cierre');
            $table->integer('cupo_asignado');
            $table->integer('limite');
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
        Schema::dropIfExists('concurso');
    }
}
