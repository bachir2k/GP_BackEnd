<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Souscomposante extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'compopsante',
        'code_souscomposante',
        'nom_souscomposante',
        'observation',
        
    ];

}
