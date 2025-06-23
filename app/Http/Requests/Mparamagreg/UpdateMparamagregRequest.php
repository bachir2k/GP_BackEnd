<?php

namespace App\Http\Requests\Mparamagreg;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMparamagregRequest extends FormRequest
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
            'nom_parametre' => 'required|string|max:255|',
            'description' => 'nullable|string|max:255'
        ];
    }
}
