<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriaDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategoria_documento', function (Blueprint $table) {
            $table->increments('id_subcategoria');
            $table->integer('id_categoria')->unsigned();
           
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria_documento')->onDelete('cascade');
            $table->string('nombre_subcategoria');
            $table->text('descripcion_subcategoria');
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
        Schema::drop('subcategoria_documento');
    }
}
