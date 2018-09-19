<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_dependencia')->unsigned();
            $table->foreign('id_dependencia')->references('id_dependencia')->on('dependencia')->onDelete('cascade');
            $table->integer('id_perfil')->unsigned();
            $table->foreign('id_perfil')->references('id_perfil')->on('perfil')->onDelete('cascade');
            $table->integer('id_pais')->unsigned();
            $table->foreign('id_pais')->references('id_pais')->on('pais')->onDelete('cascade');
            $table->integer('id_state')->unsigned();
            $table->foreign('id_state')->references('id_state')->on('states')->onDelete('cascade');
            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id_municipio')->on('municipio')->onDelete('cascade');
            $table->integer('id_ciudad')->unsigned();
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudad')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->text('avatar');
            $table->text('password');
            $table->string('cedula',12);
            $table->text('nombres');
            $table->text('apellidos');
            $table->string('telefono',12);
            $table->string('sexo',20);
            $table->text('ocupacion');
            $table->text('direccion');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
