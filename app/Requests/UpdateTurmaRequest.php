<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTurmaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'curso_id' => 'sometimes|exists:cursos,id',
            'codigo' => [
                'sometimes',
                'string',
                'max:20',
                Rule::unique('turmas')->ignore($this->turma)
            ],
            'data_inicio' => 'sometimes|date',
            'data_fim' => 'sometimes|date|after:data_inicio',
            'horario' => 'sometimes|string|max:100',
            'sala' => 'sometimes|string|max:30',
            'professor_id' => 'nullable|exists:professores,id'
        ];
    }
}