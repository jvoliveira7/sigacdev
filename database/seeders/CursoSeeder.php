<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    public function run()
    {
        Curso::create([
            'nome' => 'Engenharia de Software',
            'sigla' => 'ESW',
            'total_horas' => 3000,
            'nivel_id' => 1,  // Certifique-se que o nível com id=1 existe
            'eixo_id' => 1,   // Certifique-se que o eixo com id=1 existe
        ]);
    }
}
