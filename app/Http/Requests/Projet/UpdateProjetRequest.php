<?php

namespace App\Http\Requests\Projet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjetRequest extends FormRequest
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
            'ref_projet' => 'required|string|max:255|unique:projets,ref_projet',
            'nom_projet' => 'nullable|string|max:255',
            'Debut' => 'required|date_format:Y-m-d',
            'Fin' => 'required|date_format:Y-m-d|after_or_equal:Debut',
            'nbr_Beneficiaire' => 'required|integer|min:1',
        ];
    }
}
