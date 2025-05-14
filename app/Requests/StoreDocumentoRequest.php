<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentoRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Modifique para política de acesso se necessário
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:100|unique:documentos',
            'descricao' => 'nullable|string|max:255',
            'obrigatorio' => 'required|boolean',
            'tipo_arquivo' => 'nullable|in:pdf,image,docx' // Exemplo de validação
        ];
    }

    public function messages()
    {
        return [
            'nome.unique' => 'Já existe um documento com este nome',
            'tipo_arquivo.in' => 'O tipo de arquivo deve ser PDF, imagem ou DOCX'
        ];
    }
}