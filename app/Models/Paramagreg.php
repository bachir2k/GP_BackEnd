<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paramagreg extends Model
{
     use HasFactory;

    protected $fillable = [
        'id_mparamagreg',
        'nom_paramagreg',
        'commentaires'
    ];


    public function mparamagreg() : BelongsTo
    {
        return $this->belongsTo(Mparamagreg::class);
    }
}
