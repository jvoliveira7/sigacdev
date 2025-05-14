<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeclaracaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'aluno_id' => 'required|exists:alunos,id',
            'turma_id' => 'required|exists:turmas,id',
            'data_emissao' => 'required|date|before_or_equal:today',
            'arquivo' => 'required|file|mimes:pdf|max:2048', // Somente PDF
            'observacoes' => 'nullable|string|max:500'
        ];
    }

    public function attributes()
    {
        return [
            'turma_id' => 'turma',
            'aluno_id' => 'aluno'
        ];
    }
}