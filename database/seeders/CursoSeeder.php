<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    public function run()
    {
        $cursos = [
            ['nome' => 'PHP com Laravel', 'carga_horaria' => 40, 'valor' => 499.90],
            ['nome' => 'JavaScript Moderno', 'carga_horaria' => 30, 'valor' => 399.90],
            ['nome' => 'Gestão de Projetos', 'carga_horaria' => 20, 'valor' => 299.90],
        ];

        foreach ($cursos as $curso) {
            Curso::create([
                'categoria_id' => rand(1, 2),
                'nivel_id' => rand(1, 2),
                ...$curso
            ]);
        }
    }
}