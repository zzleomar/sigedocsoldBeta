<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficio', function (Blueprint $table) {
            $table->increments('id_oficio');
            $table->integer('id_documento')->unsigned();
            $table->foreign('id_documento')->references('id_documento')->on('documento')->onDelete('cascade');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria_documento')->onDelete('cascade');
            $table->integer('id_subcategoria')->unsigned();
            $table->foreign('id_subcategoria')->references('id_subcategoria')->on('subcategoria_documento')->onDelete('cascade');
            $table->integer('id_itemsubcategoria')->unsigned();
            $table->foreign('id_itemsubcategoria')->references('id_itemsubcategoria')->on('itemsubcategoria')->onDelete('cascade');
            $table->integer('id_estados')->unsigned();
            $table->foreign('id_estados')->references('id_estados')->on('estados')->onDelete('cascade');
            $table->integer('id_dependencia')->unsigned();
            $table->foreign('id_dependencia')->references('id_dependencia')->on('dependencia')->onDelete('cascade');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_para_user')->unsigned();
            $table->foreign('id_para_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('numero');
            $table->text('anio');
            $table->text('acronimo');
            $table->text('nota');
            $table->string('de',100);
            $table->text('cuerpo');
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
        Schema::dropIfExists('oficio');
    }
}
