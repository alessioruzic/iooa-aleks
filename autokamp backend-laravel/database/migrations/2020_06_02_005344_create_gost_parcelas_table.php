<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGostParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gost_parcelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idParcela');
            $table->foreignId('idGost');
            $table->date('datumDolazak');
            $table->date('datumOdlazak');
            $table->boolean('nositelj')->default(false);
            $table->integer('ukupnaCijena')->nullable();
            $table->timestamps();

            $table->foreign('idParcela')->references('id')->on('parcelas');
            $table->foreign('idGost')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gost_parcelas');
    }
}
