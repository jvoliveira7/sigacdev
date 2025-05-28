<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1, // Admin
            'curso_id' => 1,  // aqui você coloca o id do curso existente
        ]);

        User::create([
            'name' => 'Coordenador',
            'email' => 'coordenador@email.com',
            'password' => Hash::make('12345678'),
            'role_id' => 3, // Coordenador
           'curso_id' => 1,  // aqui você coloca o id do curso existente
        ]);

        // Criando usuários alunos diretamente aqui
        User::create([
            'name' => 'João Silva',
            'email' => 'joao@email.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2, // Aluno
            'curso_id' => 1,
        ]);

        User::create([
            'name' => 'Maria Souza',
            'email' => 'maria@email.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2, // Aluno
            'curso_id' => 1,
        ]);

        User::create([
            'name' => 'Carlos Oliveira',
            'email' => 'carlos@email.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2, // Aluno
            'curso_id' => 1,
        ]);
    }
}
