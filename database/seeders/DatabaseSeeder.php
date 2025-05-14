<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AlunoSeeder::class,
            TurmaSeeder::class,
            NivelSeeder::class,
            DeclaracaoSeeder::class,
            DocumentoSeeder::class,
            ComprovanteSeeder::class,
        ]);
    }
}
