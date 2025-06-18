<?php

namespace App\Http\Requests\SousComposante;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSousComposanteRequest extends FormRequest
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
            'composante' => 'string|max:255|',
            'code_souscomposante' => 'required|string|max:255|',
            'nom_souscomposante' => 'required|string|max:255|',
            'observation' => 'nullable|string|max:255',
        ];
    }
}
