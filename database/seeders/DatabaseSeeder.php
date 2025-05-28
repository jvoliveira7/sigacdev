<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CursoSeeder::class,
            TurmaSeeder::class,
            CategoriaSeeder::class,
            AlunoSeeder::class,
            ComprovanteSeeder::class,
        ]);
    }
}