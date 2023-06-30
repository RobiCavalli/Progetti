<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('giocatore_id');
            $table->foreign('giocatore_id')->references('id')->on('giocatori')->onDelete('cascade');
            $table->integer('score');
            $table->integer('partite_effettuate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partite');
    }
};
