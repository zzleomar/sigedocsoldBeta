<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circular', function (Blueprint $table) {
            $table->increments('id_circular');
            $table->integer('id_documento')->unsigned();
            $table->foreign('id_documento')->references('id_documento')->on('documento')->onDelete('cascade');
            $table->integer('id_itemsubcategoria')->unsigned();
            $table->foreign('id_itemsubcategoria')->references('id_itemsubcategoria')->on('itemsubcategoria')->onDelete('cascade');
            $table->text('nota_circular');
            $table->string('para_circular',100);
            $table->string('de_circular',100);
            $table->text('cuerpo_circular');
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
        Schema::drop('circular');
    }
}
