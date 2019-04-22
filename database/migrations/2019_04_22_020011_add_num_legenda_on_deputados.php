<?php

/*
PARA ALTERAR UMA TABELA ATRAVÉS DE MIGRATIONS USE O COMANDO:

    php artisan make:migration nomeMigration --table=nomeTabela
*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNumLegendaOnDeputados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deputados', function (Blueprint $table) {
            //
            $table->foreign('cod_partido')->references('num_legenda')->on('partidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deputados', function (Blueprint $table) {
            //
        });
    }
}
