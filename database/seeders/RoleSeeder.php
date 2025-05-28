<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['nome' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Usuário', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
