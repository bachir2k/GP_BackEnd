<?php

namespace App\Repositories;

use App\Models\Profil;
use Illuminate\Http\Request;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class RoleRepository.
 */
class RoleRepository
{
    // Spécifie le modèle associé à ce dépôt
    protected $Profil;

    // POST /api/role/create
    // Create a new role
    public function storeRole(array $request)
    {
        $profil = Profil::create($request);
        // Association des permissions
        if (!empty($request['permissions'])) {
            $profil->givePermissionTo($request['permissions']);
        }
        return response()->json([
            'message' => 'Profil créé avec succès',
            'profil' => $profil->load('permissions')
        ], 201);
    }

    // Get the permissions structure from the configuration
    public function getPermissionsHierarchie()
    {
        return response()->json([
            'data' => config('permission.permissions-structure')
        ]);
    }

    // GET /api/profil/all
    // Get all profils
    public function all()
    {
       return Profil::all();
    }

    //GET /api/profil/show{id}
    // Get a specific profil by ID with Permissions
    public function displayRole($id){
        
        $profil = Profil::with('permissions')->findOrFail($id);
        return response()->json($profil);
    }

    // PUT /api/profil/update{id}
    // Modify an existing profil by ID
    public function editRole($id, array $request)
    {
        $profil = Profil::findOrFail($id);

        $profil->update($request);

        $profil->syncPermissions($request['permissions'] ?? []);
         return response()->json([
             'message' => 'Rôle mis à jour avec succès',
             'profil' => $profil->load('permissions')
         ]);
    }

    // DELETE /api/profil/destroy{id}
    // Delete a profil by ID
    public function delRole($id)
    {
        Profil::findOrFail($id)->delete();
        return response()->json(['message' => 'profil deleted']);
    }

}
