<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruta', function (Blueprint $table) {
            $table->increments('id_ruta');
            $table->integer('id_estado')->unsigned();
            $table->foreign('id_estado')->references('id_estados')->on('estados')->onDelete('cascade');
            $table->integer('id_documento')->unsigned();
            $table->foreign('id_documento')->references('id_documento')->on('documento')->onDelete('cascade');
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
        Schema::drop('ruta');
    }
}
