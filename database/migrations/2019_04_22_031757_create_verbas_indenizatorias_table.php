<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerbasIndenizatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbas_indenizatorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_almg')->unsigned();
            $table->timestamp('data_referencia');
            $table->integer('cod_tipo_despesa');
            $table->float('valor_total');
            $table->integer('cod_detalhe_verba'); 
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
        Schema::dropIfExists('verbas_indenizatorias');
    }
}
