<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComprovanteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'aluno_id' => 'sometimes|exists:alunos,id',
            'documento_id' => 'sometimes|exists:documentos,id',
            'data_emissao' => 'sometimes|date|before_or_equal:today',
            'arquivo' => 'sometimes|file|mimes:pdf,jpg,png|max:5120',
            'validade' => 'nullable|date|after:data_emissao'
        ];
    }
}