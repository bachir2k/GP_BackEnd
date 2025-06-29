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
        Schema::create('paramagregs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mparamagreg')->constrained('mparamagregs')->onDelete('cascade');
            $table->string('nom_paramagreg');
            $table->string('commentaires')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paramagregs');
    }
};
