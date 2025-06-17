<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ref_projet' => 'required|string|max:255|unique:projects,ref_projet',
            'nom_project' => 'required|string|max:255',
            'Debut' => 'required|date',
            'Fin' => 'required|date|after_or_equal:Debut',
            'nbr_Beneficiaire' => 'required|integer|min:1',
        ];
    }
}
