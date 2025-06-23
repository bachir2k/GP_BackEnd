<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Indicateur extends Model
{
     use HasFactory;

    protected $fillable = [
        'id_projet',
        'code_indicateur',
        'nom_indicateur',
        'description',
        'methode_calcul',
        'source_verification',
        'commentaires',
        'id_mparamagreg'
    ];


    public function mparamagreg() : BelongsToMany
    {
        return $this->belongsToMany(Mparamagreg::class);
    }


    public function projet() : BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }
}
