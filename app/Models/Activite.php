<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activite extends Model
{

    use HasFactory;

    protected $fillable = [
        'id_souscomposante',
        'code_activite',
        'nom_activite',
        'type',
        'rationnel',
        'acivite_impact',
        'acivite_marche',
        'evidence_requise',
        'observation',

    ];

    public function souscomposante() : BelongsTo
    {
        return $this->belongsTo(Souscomposante::class);
    }
}
