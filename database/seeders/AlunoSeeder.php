<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AlunoSeeder extends Seeder
{
    public function run()
    {
$alunos = [
    [
        'nome' => 'João Silva',
        'cpf' => '111.222.333-44',
        'email' => 'joao@email.com',
        'curso_id' => 1,
        'turma_id' => 1,
        'telefone' => '99999999999',  // adicionar telefone aqui
    ],
    [
        'nome' => 'Maria Souza',
        'cpf' => '222.333.444-55',
        'email' => 'maria@email.com',
        'curso_id' => 1,
        'turma_id' => 1,
        'telefone' => '98888888888',
    ],
    [
        'nome' => 'Carlos Oliveira',
        'cpf' => '333.444.555-66',
        'email' => 'carlos@email.com',
        'curso_id' => 1,
        'turma_id' => 1,
        'telefone' => '97777777777',
    ],
];


        foreach ($alunos as $alunoData) {
            // Verifica se o usuário já existe para evitar duplicidade
            $user = User::where('email', $alunoData['email'])->first();

            if (!$user) {
                $user = User::create([
                    'name' => $alunoData['nome'],
                    'email' => $alunoData['email'],
                    'password' => Hash::make('12345678'),
                    'role_id' => 2, // assumindo que 2 é o id da role "Aluno"
                    'curso_id' => $alunoData['curso_id'], // necessário se campo for obrigatório no users
                ]);
            }

            // Verifica se o aluno já existe antes de criar
            $aluno = Aluno::where('email', $alunoData['email'])->first();
            if (!$aluno) {
                // Limpa o CPF para deixar só números
                $cpfLimpo = preg_replace('/[^0-9]/', '', $alunoData['cpf']);

                Aluno::create([
                    'user_id' => $user->id,
                    'nome' => $alunoData['nome'],
                    'cpf' => $cpfLimpo,
                    'email' => $alunoData['email'],
                    'curso_id' => $alunoData['curso_id'],
                    'turma_id' => $alunoData['turma_id'],
                     'telefone' => $alunoData['telefone'],  // obrigatório aqui também
                ]);
            }
        }
    }
}
