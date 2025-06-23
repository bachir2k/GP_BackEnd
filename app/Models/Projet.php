<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projet extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'ref_projet',
        'nom_projet',
        'Debut',
        'Fin',
        'nbr_Beneficiaire',
    ];

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function indicateur() : HasMany
    {
        return $this->hasMany(Indicateur::class);
    }

    public function composante() : HasMany
    {
        return $this->hasMany(Composante::class);
    }
}
