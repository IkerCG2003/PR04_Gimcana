<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitiosSeeder extends Seeder
{
    DB::table('tbl_usuarios')->insert([
        'id' => 1,
        'nom_usuario' => 'Adrian',
        'apell_usuario' => 'Vazquez Pascuas',
        'email_usuario' => 'adrianvazquez@gmail.com',
        'pwd_usuario' => bcrypt('qweQWE123'),
        'rol_usr' => 0, /* ROL DE ADMIN */
        'created_at' => now(),
        'updated_at' => now()
    ]);
}
