<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurmaSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Buscar os cursos já existentes na tabela `cursos`
        $curso1 = Curso::where('nome', 'PHP com Laravel')->first();  // Busca o curso pelo nome
        $curso2 = Curso::where('nome', 'JavaScript Moderno')->first(); // Busca o curso pelo nome

        // Verifica se os cursos foram encontrados antes de adicionar as turmas
        if ($curso1 && $curso2) {
            $turmas = [
                [
                    'curso_id' => $curso1->id,  // Usando o ID do curso encontrado
                    'codigo' => 'T101',
                    'nome' => 'Turma 101 - TADS',
                    'data_inicio' => '2025-06-01',
                    'data_fim' => '2025-12-01',
                    'horario' => '08:00 - 12:00',
                    'vagas' => 40,
                    'local' => 'Sala 101',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'curso_id' => $curso2->id,  // Usando o ID do curso encontrado
                    'codigo' => 'T102',
                    'nome' => 'Turma 102 - INFO',
                    'data_inicio' => '2025-07-01',
                    'data_fim' => '2025-12-30',
                    'horario' => '13:00 - 17:00',
                    'vagas' => 35,
                    'local' => 'Sala 102',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ];

            // Inserir os dados na tabela `turmas`
            DB::table('turmas')->insert($turmas);
        } else {
            // Caso algum curso não seja encontrado, exibe um erro ou faz outra ação apropriada
            echo "Erro: Não foi possível encontrar os cursos necessários para as turmas.";
        }
    }
}
