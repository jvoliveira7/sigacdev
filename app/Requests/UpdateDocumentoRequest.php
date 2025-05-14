<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => [
                'sometimes',
                'string',
                'max:100',
                Rule::unique('documentos')->ignore($this->documento)
            ],
            'descricao' => 'nullable|string|max:255',
            'obrigatorio' => 'sometimes|boolean',
            'tipo_arquivo' => 'nullable|in:pdf,image,docx'
        ];
    }
}