<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTurmaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'curso_id' => 'required|exists:cursos,id',
            'codigo' => 'required|string|max:20|unique:turmas',
            'data_inicio' => 'required|date|after_or_equal:today',
            'data_fim' => 'required|date|after:data_inicio',
            'horario' => 'required|string|max:100',
            'sala' => 'required|string|max:30',
            'professor_id' => 'nullable|exists:professores,id' // Se tiver professores
        ];
    }
}