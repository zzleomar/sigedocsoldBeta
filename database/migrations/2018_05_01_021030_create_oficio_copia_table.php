<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficioCopiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficio_copia', function (Blueprint $table) {
            $table->increments('id_oficio_copia');
            $table->integer('id_oficio')->unsigned();
            $table->foreign('id_oficio')->references('id_oficio')->on('oficio')->onDelete('cascade');
            $table->integer('id_dependencia')->unsigned();
            $table->foreign('id_dependencia')->references('id_dependencias')->on('dependencias')->onDelete('cascade');
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
        Schema::dropIfExists('oficio_copia');
    }
}
