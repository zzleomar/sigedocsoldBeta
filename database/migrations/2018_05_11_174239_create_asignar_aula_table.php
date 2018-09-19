<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignarAulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignar_aula', function (Blueprint $table) {
            $table->increments('id_asignar_aula');
            $table->integer('id_horario')->unsigned();
            $table->foreign('id_horario')->references('id_horario')->on('horario')->onDelete('cascade');
            $table->integer('id_aula')->unsigned();
            $table->foreign('id_aula')->references('id_aula')->on('aula')->onDelete('cascade');
            $table->text('dia');
            $table->time('entrada');
            $table->time('salida');
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
        Schema::dropIfExists('asignar_aula');
    }
}
