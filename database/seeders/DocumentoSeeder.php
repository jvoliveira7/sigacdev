<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentoSeeder extends Seeder
{
    public function run(): void
    {
        // Dados fictícios para a tabela `documentos`
        $documentos = [
            [
                'nome' => 'RG',
                'descricao' => 'Documento de identidade',
                'obrigatorio' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'CPF',
                'descricao' => 'Cadastro de Pessoa Física',
                'obrigatorio' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Comprovante de Residência',
                'descricao' => 'Comprovante recente de residência',
                'obrigatorio' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Certificado de Escolaridade',
                'descricao' => 'Comprovante de escolaridade do aluno',
                'obrigatorio' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Inserir os dados na tabela `documentos`
        DB::table('documentos')->insert($documentos);
    }
}
