<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAlunoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'sometimes|string|max:100',
            'email' => [
                'sometimes',
                'email',
                Rule::unique('alunos')->ignore($this->aluno)
            ],
            'cpf' => [
                'sometimes',
                'string',
                'size:11',
                Rule::unique('alunos')->ignore($this->aluno)
            ],
            'telefone' => 'sometimes|string|max:20'
        ];
    }
}