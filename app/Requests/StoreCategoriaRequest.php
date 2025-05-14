<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:50|unique:categorias',
            'descricao' => 'nullable|string|max:255',
            'icone' => 'nullable|string|max:30' // Exemplo adicional
        ];
    }

    public function messages()
    {
        return [
            'nome.unique' => 'Esta categoria já existe'
        ];
    }
}   