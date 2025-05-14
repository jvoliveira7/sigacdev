<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNivelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:50|unique:niveis',
            'descricao' => 'nullable|string|max:255',
            'dificuldade' => 'required|integer|between:1,5' // Ex: 1-5 estrelas
        ];
    }
}