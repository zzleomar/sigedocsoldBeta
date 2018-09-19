<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutaspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutasp', function (Blueprint $table) {
            $table->increments('id_ruta_p');
            $table->integer('id_estado')->unsigned();
            $table->foreign('id_estado')->references('id_estados')->on('estados')->onDelete('cascade');
            $table->integer('id_preparaduria')->unsigned();
            $table->foreign('id_preparaduria')->references('id_preparaduria')->on('preparaduria')->onDelete('cascade');
            $table->integer('id_dependencia')->unsigned();
            $table->foreign('id_dependencia')->references('id_dependencia')->on('dependencia')->onDelete('cascade');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->date('fecha');
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
        Schema::dropIfExists('rutasP');
    }
}
