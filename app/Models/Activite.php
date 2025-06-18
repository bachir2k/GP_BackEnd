<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activite extends Model
{

    use HasFactory;

    protected $fillable = [
        'composante',
        'souscomposante',
        'code_activite',
        'nom_acivite',
        'type',
        'rationnel',
        'acivite_impact',
        'acivite_marche',
        'evidence_requise',
        'observation',

    ];
}
