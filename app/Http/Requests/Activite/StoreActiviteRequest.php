<?php

namespace App\Http\Requests\Activite;

use Illuminate\Foundation\Http\FormRequest;

class StoreActiviteRequest extends FormRequest
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

            'id_souscomposante'       => 'required|integer|exists:souscomposantes,id',
            'code_activite' => 'required|string|max:255|',
            'nom_activite' => 'required|string|max:255|',
            'type' => 'boolean',
            'rationnel' => 'boolean',
            'acivite_impact' => 'boolean',
            'acivite_marche' => 'boolean',
            'evidence_requise' => 'boolean',
            'observation' => 'nullable|string|max:255',
        ];
    }
}
