<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Documento;

class DocumentoSeeder extends Seeder
{
    public function run()
    {
        Documento::create([
            'url' => 'http://exemplo.com/doc.pdf',
            'descricao' => 'Certificado de Curso',
            'horas_in' => 10,
            'status' => 'pendente',
            'comentario' => 'Aguardando validação',
            'horas_out' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ]);
    }
}
