<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGostKategorijasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gost_kategorijas', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->integer('godina_pocetak');
            $table->integer('godina_kraj');
            $table->integer('cijena');
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
        Schema::dropIfExists('gost_kategorijas');
    }
}
