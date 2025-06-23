<?php

namespace App\Http\Requests\Paramagreg;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParamagregRequest extends FormRequest
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

            'nom_paramagreg' =>  'required|string|max:255|',
            'commentaires' => 'nullable|string|max:255'
        ];
    }
}
