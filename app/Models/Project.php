<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
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
}
