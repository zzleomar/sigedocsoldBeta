<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciaUdoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencia_udo', function (Blueprint $table) {
            $table->increments('id_dependencia');
            $table->char('dependencia',13);
            $table->text('unidad_solicitante');
            $table->text('unidad_ejecutora');
            $table->integer('nucleo');
            $table->char('siglas',10);
            $table->text('descripcion');
            $table->text('responsable_soli');
            $table->text('responsable_ejec');
            $table->char('ano',4);
            $table->text('descripcion_unidad_eje');
            $table->text('codigo_jerarquico');
            $table->text('cod_compuesto');
            $table->integer('nivel');
            $table->text('descripcion_unidad_sol');
            $table->text('cargo_solicitante');
            $table->text('cargo_ejecutor');
            $table->text('rowid');
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
        Schema::dropIfExists('dependencia');
    }
}
