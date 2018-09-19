<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_compra', function (Blueprint $table) {
            $table->increments('id_solicitud_compra');
            $table->integer('compra_id')->unsigned();
            $table->foreign('compra_id')->references('id_compra')->on('compra')->onDelete('cascade');
            $table->integer('material_id')->unsigned();
            $table->foreign('material_id')->references('id_material')->on('material')->onDelete('cascade');
            $table->integer('cantidad');
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
        Schema::dropIfExists('solicitud_compra');
    }
}
