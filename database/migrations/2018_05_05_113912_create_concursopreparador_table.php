<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcursopreparadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concurso_preparador', function (Blueprint $table) {
            $table->increments('id_concurso_preparador');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_preparaduria')->unsigned();
            $table->foreign('id_preparaduria')->references('id_preparaduria')->on('preparaduria')->onDelete('cascade');
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id_periodo')->on('periodo')->onDelete('cascade');
            $table->float('puntaje');
            $table->text('condicion');
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
        Schema::dropIfExists('concursoperparador');
    }
}
