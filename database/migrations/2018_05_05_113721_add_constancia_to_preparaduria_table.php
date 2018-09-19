<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstanciaToPreparaduriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preparaduria', function (Blueprint $table) {
            $table->text('inscripcion');
            $table->text('horario');
            $table->text('curriculum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preparaduria', function (Blueprint $table) {
            //
        });
    }
}
