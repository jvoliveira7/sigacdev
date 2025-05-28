<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comprovante;

class ComprovanteSeeder extends Seeder
{
    public function run()
    {
        Comprovante::create([
            'horas' => 20,
            'atividade' => 'Participação em evento acadêmico',
            'categoria_id' => 1,
            'aluno_id' => 1,
            'user_id' => 1
        ]);
    }
}
