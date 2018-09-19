<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factores', function (Blueprint $table) {
        $table->increments('id_factores');
         $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_preparaduria')->unsigned();
            $table->foreign('id_preparaduria')->references('id_preparaduria')->on('preparaduria')->onDelete('cascade');
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id_periodo')->on('periodo')->onDelete('cascade');
            $table->float('f1');
            $table->float('f2');
            $table->float('f3');
            $table->float('f4');
            $table->float('f5');
            $table->float('f6');
            $table->float('f7');
            $table->float('f8');
            $table->float('f9');
            $table->float('f10'); 
            $table->integer('lugar');
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
        Schema::dropIfExists('factores');
    }
}
