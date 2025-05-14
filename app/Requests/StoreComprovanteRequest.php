<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComprovanteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'aluno_id' => 'required|exists:alunos,id',
            'documento_id' => 'required|exists:documentos,id',
            'data_emissao' => 'required|date|before_or_equal:today',
            'arquivo' => 'required|file|mimes:pdf,jpg,png|max:5120', // 5MB
            'validade' => 'nullable|date|after:data_emissao'
        ];
    }

    public function attributes()
    {
        return [
            'documento_id' => 'documento',
            'aluno_id' => 'aluno'
        ];
    }
}