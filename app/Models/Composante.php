<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Composante extends Model
{
     use HasFactory;

    protected $fillable = [
        'code_composante',
        'nom_composante',
        'observation',
        
    ];
}
