<?php

namespace App\Http\Requests\Indicateur;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndicateurRequest extends FormRequest
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
            'id_projet'       => 'required|integer|exists:projets,id',
            'code_indicateur' => 'required|string|max:255|',
            'nom_indicateur' => 'required|string|max:255|',
            'description' => 'nullable|string|max:255',
            'methode_calcul' => 'nullable|string|max:255',
            'source_verification' => 'nullable|string|max:255',
            'commentaires' => 'nullable|string|max:255',
            'id_mparamagreg'       => 'required|integer|exists:mparamagregs,id',

        ];
    }
}
