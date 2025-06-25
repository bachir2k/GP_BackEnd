<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profil extends SpatieRole
{
    protected $table = 'profil'; // Assuming the table name is 'profil'

    protected $fillable = [
        'name',
        'description',
        'guard_name',
    ];

    // public function users() : HasMany
    // {
    //     return $this->hasMany(User::class);
    // }
    
}

// This class extends the Spatie Role model to include a description field
// and allows for custom fillable attributes. It can be used to manage roles in the application