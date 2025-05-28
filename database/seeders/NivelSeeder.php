<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nivel;

class NivelSeeder extends Seeder
{
    public function run()
    {
        Nivel::create([
            'nome' => 'Superior',
        ]);
    }
}
