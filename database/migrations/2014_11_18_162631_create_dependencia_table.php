<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencia', function (Blueprint $table) {
            $table->increments('id_dependencia');
            $table->integer('id_institucion')->unsigned();
            $table->foreign('id_institucion')->references('id_institucion')->on('institucion')->onDelete('cascade');
            $table->integer('id_escuela')->unsigned();
            $table->foreign('id_escuela')->references('id_escuela')->on('escuela')->onDelete('cascade');
            $table->string('nombre_dependencia',200);
            $table->text('descripcion_dependencia');
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
        Schema::drop('dependencia');
    }
}
