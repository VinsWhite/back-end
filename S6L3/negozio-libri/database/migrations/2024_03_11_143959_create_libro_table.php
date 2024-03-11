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
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->string('titolo')->unique();
            $table->text('descrizione');
            $table->integer('anno_pubblicazione');
            $table->foreignId('categoria_id');
            $table->foreignId('autore_id');
            $table->timestamps();

            // Definizione delle chiavi esterne
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('autore_id')->references('id')->on('autore')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro');
    }
};
