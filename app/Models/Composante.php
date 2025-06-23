<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Composante extends Model
{
     use HasFactory;

    protected $fillable = [
        'id_projet',
        'code_composante',
        'nom_composante',
        'observation',
        
    ];

     public function souscomposante() : HasMany
    {
        return $this->hasMany(Souscomposante::class);
    }

    public function projet() : BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }
}
