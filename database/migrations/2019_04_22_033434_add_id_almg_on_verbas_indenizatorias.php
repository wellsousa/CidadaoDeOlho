<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdAlmgOnVerbasIndenizatorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('verbas_indenizatorias', function (Blueprint $table) {
            //
            $table->foreign('id_almg')->references('id_almg')->on('deputados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('verbas_indenizatorias', function (Blueprint $table) {
            //
        });
    }
}
