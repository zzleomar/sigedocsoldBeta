<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->increments('id_documento');
            $table->integer('id_dependencia_c')->unsigned();
            $table->foreign('id_dependencia_c')->references('id_dependencia')->on('dependencia')->onDelete('cascade');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria_documento')->onDelete('cascade');
            $table->integer('id_subcategoria')->unsigned();
            $table->foreign('id_subcategoria')->references('id_subcategoria')->on('subcategoria_documento')->onDelete('cascade');
            $table->integer('id_itemsubcategoria')->unsigned();
            $table->foreign('id_itemsubcategoria')->references('id_itemsubcategoria')->on('itemsubcategoria')->onDelete('cascade');
            $table->integer('id_estados')->unsigned();
            $table->foreign('id_estados')->references('id_estados')->on('estados')->onDelete('cascade');
            $table->integer('codigo_plantilla')->unique();
            $table->text('descripcion_documento');
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
        Schema::drop('documento');
    }
}
