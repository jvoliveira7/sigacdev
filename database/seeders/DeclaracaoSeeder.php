<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Turma;
use Faker\Factory as Faker;

class DeclaracaoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        // Garante que há alunos e turmas no banco
        $alunos = Aluno::all();
        $turmas = Turma::all();

        if ($alunos->isEmpty() || $turmas->isEmpty()) {
            $this->command->warn('Não há alunos ou turmas suficientes para criar declarações.');
            return;
        }

        foreach (range(1, 10) as $i) {
            Declaracao::create([
                'aluno_id' => $alunos->random()->id,
                'turma_id' => $turmas->random()->id,
                'data_emissao' => $faker->date(),
                'arquivo' => 'declaracao_' . $i . '.pdf',
            ]);
        }
    }
}

