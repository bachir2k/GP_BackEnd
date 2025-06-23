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
        Schema::create('indicateurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_projet')->constrained()->onDelete('cascade');
            $table->string('code_indicateur');
            $table->string('nom_indicateur');
            $table->string('description')->nullable();
            $table->string('methode_calcul')->nullable();
            $table->string('source_verification')->nullable();
            $table->string('commentaires')->nullable();
            $table->foreignId('id_mparamagreg')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicateurs');
    }
};
