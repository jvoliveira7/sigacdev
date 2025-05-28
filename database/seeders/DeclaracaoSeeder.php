<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Declaracao;

class DeclaracaoSeeder extends Seeder
{
    public function run()
    {
        Declaracao::create([
            'hash' => 'abc123',
            'data' => now(),
            'aluno_id' => 1,
            'comprovante_id' => 1
        ]);
    }
}
