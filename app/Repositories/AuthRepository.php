<?php

namespace App\Repositories;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class AuthRepository
{
    // Spécifie le modèle associé à ce dépôt
    protected $User;

    // Cette méthode permet à un nouvel utilisateur de s'inscrire
    public function register(array $data)
    {
        $user =User::create($data);
        return 'Utilisateur créé avec succès !'; // Renvoie un message de succès après l'inscription
    }

    // Cette méthode permet à un utilisateur de se connecter une fois inscrit(possède un compte)
    public function login(array $request)
    {
        // Auth::attempt() vérifie si l'utilisateur a été authentifié 
        // Sinon, renvoie une réponse JSON avec un message d'erreur et un code d'état 401 (non autorisé)
        if (!$token = Auth::attempt($request)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // Sinon, génère un token JWT pour l'utilisateur authentifié
        // et le renvoie dans la réponse JSON
        // dd($token);
        return $this->respondWithToken($token);
    }

    //Réponse JSON
    protected function respondWithToken($token)
    { 
        return [
            'access_token' => $token, // Renvoi du token JWT
            // avec le type de token et la durée d'expiration
            'token_type'   => 'Bearer',
            'expires_in'   => Auth::factory()->getTTL() * 60  // secondes
        ];
    }

    // Cette méthode permet à un utilisateur de demander un lien de réinitialisation de mot de passe
    // en fournissant son adresse e-mail
    public function forgotPassword(array $request)
    {
        $status = Password::sendResetLink($request);
        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Lien de réinitialisation envoyé.'])
            : response()->json(['message' => 'Erreur lors de l\'envoi.'], 500);
    }
    
    public function resetPassword(array $request)
    {
        $status = Password::reset(
            $request,
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
    
        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => 'Mot de passe réinitialisé avec succès.'])
            : response()->json(['message' => 'Le lien est invalide ou a expiré.'], 400);
    }

    // Cette méthode permet à un utilisateur de changer son mot de passe
    // en fournissant son mot de passe actuel et le nouveau mot de passe
    public function changePassword(string $currentPassword, string $newPassword)
    {
        $user = Auth::user();
    
        if (!Hash::check($currentPassword, $user->password)) {
            return response()->json(['error' => 'Mot de passe actuel incorrect'], 401);
        }
    
        $user->update([
            'password' => Hash::make($newPassword)
        ]);
    
        return response()->json(['message' => 'Mot de passe changé avec succès.']);
    }
    

    // Mise à jour du profil de l'utilisateur
    public function updateProfile(array $request)
    {
        $user = Auth::user();
        $user->update($request);  
        // return $this->respondWithToken(Auth::tokenById($user->id)); // Renvoie un nouveau token JWT après la mise à jour du profil
        if ($user)
        {
            return response()->json(['message' => 'Profil mis à jour avec succès']);
        }
    }

    // Renvoie les informations de l'utilisateur actuellement authentifié(connecté)
    public function getConnectedUser()
    {
        // Renvoie les informations de l'utilisateur actuellement authentifié(connecté)
        return response()->json(Auth::user());
    }

    // Renvoie tous les utilisateurs
    public function AllUsers()
    {
        if (Auth::user()) {
            return response()->json(User::all());
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Permet à un utilisateur de se déconnecter
    public function logout()
    {
        Auth::logout();
    }

    // // Assign a role to a user
    // public function assignRoleUser(array $request)
    // {   
    //     $user = User::find($request['id_user']);
    //     $user->profil()->sync($request['id_profil']); // false to avoid detaching existing roles
    // }   
    
    // // Remove a role from a user
    // public function removeRoleFromUser(array $request)
    // {
    //     $user = User::find($request['id_user']);
    //     $user->profil()->detach($request['id_profil']);
    // }
    
}

