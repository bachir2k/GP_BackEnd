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
             $table->string('composante')->nullable();
            $table->string('souscomposante')->nullable();
            $table->string('code_activite');
            $table->string('nom_acivite');
            $table->boolean('type');
            $table->boolean('rationnel');
            $table->boolean('acivite_impact');
            $table->boolean('acivite_marche');
            $table->boolean('evidence_requise');
            $table->string('observation');
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
