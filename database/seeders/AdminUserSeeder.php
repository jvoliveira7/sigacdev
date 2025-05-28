<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {   
   User::create([
    'name' => 'Admin',
    'email' => 'admin@exemplo.com',
    'password' => Hash::make('12345678'),
    'role_id' => 1,    // coloque o id correto do role admin que você tenha
    'curso_id' => 1,   // coloque um curso válido ou faça nullable se for opcional
        ]);
    }
}
