<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AlunoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        foreach (range(1, 20) as $index) {
            Aluno::create([
                'nome' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'cpf' => $faker->unique()->cpf(false), // Remove pontuação
                'telefone' => $faker->cellphone(false), // Remove máscara
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}