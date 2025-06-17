<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'identifiant' => 'required|string|max:255',
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email', // Vérification si l'utilisateur est déjà inscrit
            'password' => 'required|min:8',
            'description' => 'required|string|min:5',
            'phone'   => 'required|string|max:255|unique:users,phone',
            'profils'   => 'array',
            'profils.*' => 'exists:profils,id', // Vérification si le profil existe
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'L’adresse e-mail est obligatoire.',
            'email.email' => 'Le format de l’adresse e-mail est invalide.',
            'email.exists' => 'Aucun utilisateur trouvé avec cette adresse e-mail.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
        ];
    }
}
