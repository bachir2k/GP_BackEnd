<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
       return true;
    }

    public function rules(): array
    {
        return [
            'ref_projet' => 'required|string|max:255',
            'nom_projet' => 'required|string|max:255',
            'Debut' => 'required|date',
            'Fin' => 'required|date|after_or_equal:Debut',
            'nbr_Beneficiaire' => 'required|integer|min:1',
        ];
    }
}
