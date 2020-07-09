<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUslugaGostParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usluga_gost_parcelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idGostParcela');
            $table->foreignId('idUsluga');
            $table->integer('kolicina');
            $table->timestamps();

            $table->foreign('idGostParcela')->references('id')->on('gost_parcelas');
            $table->foreign('idUsluga')->references('id')->on('uslugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usluga_gost_parcelas');
    }
}
