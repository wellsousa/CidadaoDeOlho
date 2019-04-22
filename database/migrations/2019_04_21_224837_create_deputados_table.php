<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeputadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deputados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_almg')->unsigned()->unique();
            $table->string('nome', 50);
            $table->integer('cod_partido')->unsigned();
            //$table->foreign('cod_partido')->references('num_legenda')->on('partidos');
            $table->integer('tag_localizacao');
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
        Schema::dropIfExists('deputados');
    }
}
