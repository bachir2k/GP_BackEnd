<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Http\Requests\Role\createRoleRequest;
use App\Http\Requests\Role\updateRoleRequest;

class RoleController extends Controller
{
    public function __construct(protected RoleRepository $roleRepository) {

    }

    // POST /api/role/create
    // Create a new role
    public function createRole(createRoleRequest $request)
    {
        $profil = $this->roleRepository->storeRole($request->validated());
        return response()->json([
            'message' => 'Profil créé avec succès',
            'profil' => $profil,
        ], 201);
        
    }

    public function getPermissionsStructure()
    {
        return $this->roleRepository->getPermissionsHierarchie();
        
    }

    // GET /api/profil/all
    // Get all profils
    public function index()
    {
        return response()->json($this->roleRepository->all());
    }

    //GET /api/profil/show{id}
    // Get a specific profil by ID with Permissions
    public function showRole($id)
    {

        return response()->json($this->roleRepository->displayRole($id));
    }

    // PUT /api/profil/update{id}
    // Modify an existing profil by ID
    public function updateRole($id, updateRoleRequest $request)
    {
        $profil = $this->roleRepository->editRole($id, $request->validated());
        return response()->json([
            'message' => 'Profil mis à jour avec succès',
            'profil' => $profil
        ]);
    }

    // DELETE /api/profil/destroy{id}
    // Delete a profil by ID
    public function destroyRole($id)
    {
        return response()->json($this->roleRepository->delRole($id));
    }
}
