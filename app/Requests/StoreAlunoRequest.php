<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAlunoRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Alterar para política de acesso se necessário
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:alunos,email',
            'cpf' => 'required|string|size:11|unique:alunos,cpf',
            'telefone' => 'required|string|max:20'
        ];
    }

    public function messages()
    {
        return [
            'cpf.size' => 'O CPF deve conter exatamente 11 dígitos',
            'email.unique' => 'Este e-mail já está cadastrado'
        ];
    }
}