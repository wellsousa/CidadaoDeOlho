<?php

/*
PARA CRIAR UMA MIGRATION EXISTEM DUAS FORMAS:

    php artisan make:model nomeModelo -m

    php artisan make:migration nomeMigration --create=nomeTabela
*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('num_legenda')->unsigned()->unique();
            $table->string('sigla', 20);
            $table->text('descricao');
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
        Schema::dropIfExists('partidos');
    }
}
