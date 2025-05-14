<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeclaracaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'aluno_id' => 'sometimes|exists:alunos,id',
            'turma_id' => 'sometimes|exists:turmas,id',
            'data_emissao' => 'sometimes|date|before_or_equal:today',
            'arquivo' => 'sometimes|file|mimes:pdf|max:2048',
            'observacoes' => 'nullable|string|max:500'
        ];
    }
}