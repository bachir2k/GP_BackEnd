<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'identifiant',
        'id_profil',
        'name',
        'email',
        'password',
        'phone',
        'description',
        'profil',
    ];

    // 1️⃣ Obligatoire : identifiant unique pour le JWT
    public function getJWTIdentifier()
    {
        // typiquement l'ID de l'utilisateur
        return $this->getKey(); // équivaut à $this->id
    }

    // 2️⃣ Facultatif : ajouter des données personnalisées au token
    public function getJWTCustomClaims()
    {
        // Je peux ici retourner un tableau d'informations personnalisées du user authentifié
        // qui seront ajoutées au token JWT.
        // Exemple : ['role' => $this->role, 'is_admin' => true]
        return [
            'name' => $this->name,
            'email' => $this->email,
            'profil' => $this->profil,
       ];
    }

    // public function profil() : BelongsTo
    // {
    //     return $this->belongsTo(Profil::class);
    // }

    public function projets() : BelongsToMany
    {
        return $this->belongsToMany(Projet::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
