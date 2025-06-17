<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AssignRoleRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\RemoveRoleUserRequest;

class AuthController extends Controller
{

    public function __construct( protected AuthRepository $authRepository)
    {
        
    }

    // POST /api/register (Inscription)
    public function createUser(RegisterRequest $request)
    {
        $response=$this->authRepository->register($request->validated());
        return response()->json($response);
    }

    // POST /api/login (Connexion)
    public function login(LoginRequest $request)
    {
        $token = $this->authRepository->login($request->validated());
        return $token;
    }

    // POST /api/forgot-password
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        return $this->authRepository->forgotPassword($request->only('email'));
        
    }   
    
    // POST /api/reset-password
    public function resetPassword(ResetPasswordRequest $request)
    {
        return $this->authRepository->resetPassword($request->validated());
    }

    // POST /api/change-password
    public function changePassword(ChangePasswordRequest $request)
    {
       
            return $this->authRepository->changePassword(
                $request->current_password,
                $request->new_password
            );
    
        return response()->json(['message' => 'Mot de passe changé avec succès']);
    }
    // POST /api/update-profile
    public function updateProfile(UpdateProfileRequest $request)
    {
        return $this->authRepository->updateProfile($request->validated()); 
    }

    // GET /api/me
    public function getConnected()
    {
        $response = $this->authRepository->getConnectedUser();
        return response()->json($response);
    }

    // GET /api/users
    public function getAllUsers()
    {
        $users = $this->authRepository->AllUsers();
        return response()->json($users);
    }
    
    // POST /api/logout
    public function logout()
    {  
        $this->authRepository->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    // // POST /api/assign-role
    // public function assignRoleToUser(AssignRoleRequest $request)
    // {
    //     $this->authRepository->assignRoleToUser($request->validated());
    //     return response()->json(['message' => 'Role assigned successfully.'], 200);
    // }

    // // DELETE /api/remove-role
    // public function removeRoleFromUser(RemoveRoleUserRequest $request)
    // {
    //     $this->authRepository->removeRoleFromUser($request->validated());
    //     return response()->json(['message' => 'Role removed successfully.'], 200);
    // }
    
}
