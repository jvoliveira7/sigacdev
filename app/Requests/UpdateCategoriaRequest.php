<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
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
                Rule::unique('categorias')->ignore($this->categoria)
            ],
            'descricao' => 'nullable|string|max:255',
            'icone' => 'nullable|string|max:30'
        ];
    }
}