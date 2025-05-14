<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCursoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'categoria_id' => 'required|exists:categorias,id',
            'nivel_id' => 'required|exists:niveis,id',
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string',
            'carga_horaria' => 'required|integer|min:1',
            'valor' => 'required|numeric|min:0'
        ];
    }
}