<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposVerbasIndenizatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_verbas_indenizatorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cod_tipo_despesa');
            $table->string('desc_tipo_despesa', 300);
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
        Schema::dropIfExists('tipos_verbas_indenizatorias');
    }
}
