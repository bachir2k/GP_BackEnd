<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mparamagreg extends Model
{
     use HasFactory;

    protected $fillable = [
        'nom_parametre',
        'description'
    ];


    public function paramagreg() : HasMany
    {
        return $this->hasMany(Paramagreg::class);
    }


    public function indicateur() : BelongsToMany
    {
        return $this->belongsToMany(Indicateur::class);
    }
}
