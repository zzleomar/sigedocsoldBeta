<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiudadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudad', function (Blueprint $table) {
            $table->increments('id_ciudad');
            $table->integer('id_pais')->unsigned();
            $table->foreign('id_pais')->references('id_pais')->on('pais')->onDelete('cascade');
            $table->integer('id_state')->unsigned();
            $table->foreign('id_state')->references('id_state')->on('states')->onDelete('cascade');
            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id_municipio')->on('municipio')->onDelete('cascade');
            $table->text('nombre');
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
        Schema::dropIfExists('ciudad');
    }
}
