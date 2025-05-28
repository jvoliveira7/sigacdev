<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::create([
            
            'nome' => 'Atividades Complementares',
            'maximo_horas' => 200,
            'curso_id' => 1
            
        ]);
    }
}
