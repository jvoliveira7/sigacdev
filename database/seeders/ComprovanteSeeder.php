<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ComprovanteSeeder extends Seeder
{
    public function run(): void
    {
        // Obtendo IDs dos alunos e documentos existentes
        $alunos = DB::table('alunos')->pluck('id');
        $documentos = DB::table('documentos')->pluck('id');

        // Gerando dados fictícios para comprovantes
        $comprovantes = [
            [
                'aluno_id' => $alunos->random(),
                'documento_id' => $documentos->random(),
                'data_emissao' => Carbon::now()->subDays(rand(1, 365)), // Data aleatória nos últimos 365 dias
                'arquivo' => 'comprovante_' . Str::random(10) . '.pdf', // Nome de arquivo aleatório
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aluno_id' => $alunos->random(),
                'documento_id' => $documentos->random(),
                'data_emissao' => Carbon::now()->subDays(rand(1, 365)),
                'arquivo' => 'comprovante_' . Str::random(10) . '.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aluno_id' => $alunos->random(),
                'documento_id' => $documentos->random(),
                'data_emissao' => Carbon::now()->subDays(rand(1, 365)),
                'arquivo' => 'comprovante_' . Str::random(10) . '.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Inserir os dados na tabela `comprovantes`
        DB::table('comprovantes')->insert($comprovantes);
    }
}
