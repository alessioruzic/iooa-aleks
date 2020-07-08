<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id();
            $table->integer('brojParcela');
            $table->integer('velicinaParcela');
            $table->foreignId('idTipParcela');
            $table->foreignId('idOpisParcela');
            $table->string('image');
            $table->timestamps();

            $table->foreign('idTipParcela')->references('id')->on('tips')->onDelete('cascade');
            $table->foreign('idOpisParcela')->references('id')->on('opis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelas');
    }
}
