<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficioContratacionPreparadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficio_contratacion_preparador', function (Blueprint $table) {
            $table->increments('id_oficio_contratacion_preparador');
            $table->integer('id_oficio')->unsigned();
            $table->foreign('id_oficio')->references('id_oficio')->on('oficio')->onDelete('cascade');
            $table->integer('id_concurso')->unsigned();
            $table->foreign('id_concurso')->references('id_concurso')->on('concurso')->onDelete('cascade');
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id_periodo')->on('periodo')->onDelete('cascade');
            $table->text('descripcion');
            $table->text('nro_consejo');
            $table->text('fecha_consejo');;
            $table->text('fecha_contratacion');
            $table->text('observacion');
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
        Schema::dropIfExists('oficio_contratacion_preparador');
    }
}
