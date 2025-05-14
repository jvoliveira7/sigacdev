<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            'Tecnologia',
            'Negócios',
            'Saúde',
            'Educação',
            'Artes'
        ];

        $now = now(); // Captura o timestamp atual

        foreach ($categorias as $categoria) {
            Categoria::create([
                'nome' => $categoria,
                'descricao' => "Cursos de $categoria",
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
