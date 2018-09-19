<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->increments('id_estudiante');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')->references('id_tipo')->on('tipo')->onDelete('cascade');
            $table->integer('id_dependencia')->unsigned();
            $table->foreign('id_dependencia')->references('id_dependencia')->on('dependencia')->onDelete('cascade');
            $table->integer('id_dedicacion_estudiante')->unsigned();
            $table->foreign('id_dedicacion_estudiante')->references('id_dedicacion_estudiante')->on('dedicacion_estudiante')->onDelete('cascade');
            $table->text('firma')->nullable();
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
        Schema::drop('estudiante');
    }
}
