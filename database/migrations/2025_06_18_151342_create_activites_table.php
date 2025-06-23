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
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_souscomposante')->constrained()->onDelete('cascade');
            $table->string('code_activite');
            $table->string('nom_activite');
            $table->boolean('type');
            $table->boolean('rationnel');
            $table->boolean('acivite_impact');
            $table->boolean('acivite_marche');
            $table->boolean('evidence_requise');
            $table->string('observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activites');
    }
};
