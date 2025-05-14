<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNivelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => [
                'sometimes',
                'string',
                'max:50',
                Rule::unique('niveis')->ignore($this->nivel)
            ],
            'descricao' => 'nullable|string|max:255',
            'dificuldade' => 'sometimes|integer|between:1,5'
        ];
    }
}