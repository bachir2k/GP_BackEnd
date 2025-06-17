<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class RoleController extends Controller
{
    // POST /api/role/create
    // Create a new role
    public function createRole(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:roles'
        ]);

        $role = Role::create([
            'name' => $data['name'] // Saisie du nom du rôle
        ]);
        return response()->json('Role created successfully', 201);
    }

    // GET /api/role/all
    // Get all roles
    public function index()
    {
       $roles = Role::all();
       return $roles;
    }

    //GET /api/role/show{id}
    // Get a specific role by ID
    public function showRole(Role $role){
        
        return response()->json($role);
    }

    // PUT /api/role/update{id}
    // Modify an existing role by ID
    public function updateRole(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|unique:roles,name' . $id
        ]);
        $role->update($data);

        return response()->json($role);
    }

    // DELETE /api/role/destroy{id}
    // Delete a role by ID
    public function destroyRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['message' => 'Role deleted']);
    }

      
}


