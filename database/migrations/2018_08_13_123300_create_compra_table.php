<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->increments('id_compra');
            $table->integer('dependencia_id')->unsigned();
            $table->foreign('dependencia_id')->references('id_dependencia')->on('dependencia_udo')->onDelete('cascade');
            $table->integer('estatus_id')->unsigned();
            $table->foreign('estatus_id')->references('id_estados')->on('estados')->onDelete('cascade');
            $table->date('fecha');
            $table->text('nro_solicitud');
            $table->text('anio');
            $table->text('observacion');
            $table->text('solicitado_por');
            $table->text('conformado_por');
            $table->text('autorizado_por');
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
        Schema::dropIfExists('compra');
    }
}
