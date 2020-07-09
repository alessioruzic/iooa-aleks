<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaznaGostParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kazna_gost_parcelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idGostParcela');
            $table->foreignId('idKazna');
            $table->foreignId('idKontrola');
            $table->timestamps();

            $table->foreign('idGostParcela')->references('id')->on('gost_parcelas');
            $table->foreign('idKazna')->references('id')->on('kaznas');
            $table->foreign('idKontrola')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kazna_gost_parcelas');
    }
}
