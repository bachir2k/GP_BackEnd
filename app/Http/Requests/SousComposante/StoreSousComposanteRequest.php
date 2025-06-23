<?php

namespace App\Http\Requests\SousComposante;

use Illuminate\Foundation\Http\FormRequest;

class StoreSousComposanteRequest extends FormRequest
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
            'id_composante'       => 'required|integer|exists:composantes,id',
            'code_souscomposante' => 'required|string|max:255|',
            'nom_souscomposante' => 'required|string|max:255|',
            'observation' => 'nullable|string|max:255',
        ];
    }
}
