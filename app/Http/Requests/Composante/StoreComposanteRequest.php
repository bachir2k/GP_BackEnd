<?php

namespace App\Http\Requests\Composante;

use Illuminate\Foundation\Http\FormRequest;

class StoreComposanteRequest extends FormRequest
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
        'code_composante' => 'required|string|max:255',
        'nom_composante'  => 'required|string|max:255',
        'observation'     => 'nullable|string|max:255',
    ];
}

}
