<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Tipo di oggetto (libro, gioiello, abito)
            $table->decimal('price', 5, 2); // Prezzo dell'oggetto (massimo 3 cifre intere, 2 cifra decimale)
            $table->enum('status', ['venduto', 'non venduto'])->default('non venduto'); // Stato dell'oggett
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
