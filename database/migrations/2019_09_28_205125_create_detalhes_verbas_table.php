<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalhesVerbasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes_verbas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cod_detalhe_verba');
            $table->integer('cod_prestadora');
            $table->string('cod_documento', 50);
            $table->timestamp('data_emissao');
            $table->float('valor_despesa');
            $table->float('valor_reembolsado');
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
        Schema::dropIfExists('detalhe_verbas');
    }
}
