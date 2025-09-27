<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompareCiclistasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'c1' => ['required', 'integer', 'exists:ciclistas,id'],
            'c2' => ['required', 'integer', 'exists:ciclistas,id', 'different:c1'],
        ];
    }

    public function messages(): array
    {
        return [
            'c1.required' => 'Se requiere la ID del primer ciclista',
            'c2.required' => 'Se requiere la ID del segundo ciclista',
            'c1.exists' => 'El ciclista 1 no existe',
            'c2.exists' => 'El ciclista 2 no existe',
            'c2.different' => 'Los ciclistas deben ser distintos',
        ];
    }
}
