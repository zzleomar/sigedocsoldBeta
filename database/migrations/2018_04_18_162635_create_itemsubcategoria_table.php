<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsubcategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemsubcategoria', function (Blueprint $table) {
            $table->increments('id_itemsubcategoria');
            $table->integer('id_subcategoria')->unsigned();
            
            $table->foreign('id_subcategoria')->references('id_subcategoria')->on('subcategoria_documento')->onDelete('cascade');
            $table->string('nombre_itemsubcategoria',100);
            $table->text('descripcion_itemsubcategoria',100);
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
        Schema::drop('itemsubcategoria');
    }
}
