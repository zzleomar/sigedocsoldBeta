<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdNomNucleoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id_nom_nucleo')->after('id_perfil')->unsigned();
            $table->foreign('id_nom_nucleo')->references('id_nom_nucleo')->on('nom_nucleo')->onDelete('cascade');
            $table->integer('personal_id')->after('id_perfil')->unsigned();
            $table->foreign('personal_id')->references('id_personal')->on('personal')->onDelete('cascade');
            $table->integer('status_id')->after('id_perfil')->unsigned();
            $table->foreign('status_id')->references('id_status')->on('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
