<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreparaduriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparaduria', function (Blueprint $table) {
            $table->increments('id_preparaduria');
            $table->integer('id_estados')->unsigned();
            $table->foreign('id_estados')->references('id_estados')->on('estados')->onDelete('cascade');
            $table->integer('id_concurso')->unsigned();
            $table->foreign('id_concurso')->references('id_concurso')->on('concurso')->onDelete('cascade');
            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id_estudiante')->on('estudiante')->onDelete('cascade');
            $table->integer('id_asignatura')->unsigned();
            $table->foreign('id_asignatura')->references('id_asignatura')->on('asignatura')->onDelete('cascade');
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id_periodo')->on('periodo')->onDelete('cascade');
            $table->integer('numero');
            $table->text('anio');
            $table->text('semestre');
            $table->text('creditos_aprobados');
            $table->text('promedio_general');
            $table->text('record');
            $table->text('nota');
            $table->text('observacion');
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
        Schema::dropIfExists('preparaduria');
    }
}
