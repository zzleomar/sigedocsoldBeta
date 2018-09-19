<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlazasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plazas', function (Blueprint $table) {
            $table->increments('id_plazas');
            $table->integer('id_concurso')->unsigned();
            $table->foreign('id_concurso')->references('id_concurso')->on('concurso')->onDelete('cascade');
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
        Schema::dropIfExists('plazas');
    }
}
