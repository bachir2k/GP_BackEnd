<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Souscomposante extends Model
{
    
   protected $fillable = [
        'id_composante',
        'code_souscomposante',
        'nom_souscomposante',
        'observation',
        
    ];

    public function composante() : BelongsTo
    {
        return $this->belongsTo(Composante::class);
    }


    public function activite() : HasMany
    {
        return $this->hasMany(Activite::class);
    }

}
