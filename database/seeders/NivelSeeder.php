<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nome' => 'Básico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Intermediário',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Avançado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('niveis')->insert($data);
    }
}
