<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    public function run(): void
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
        DB::table('tbl_usuarios')->insert([
            'id' => 2,
            'nom_usuario' => 'Polmarc',
            'apell_usuario' => 'Montero Roca',
            'email_usuario' => 'polmarc@gmail.com',
            'pwd_usuario' => bcrypt('qweQWE123'),
            'rol_usr' => 1, /* ROL DE USUARIO */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_usuarios')->insert([
            'id' => 3,
            'nom_usuario' => 'Iker',
            'apell_usuario' => 'Catalan',
            'email_usuario' => 'ikercatalan@gmail.com',
            'pwd_usuario' => bcrypt('qweQWE123'),
            'rol_usr' => 1, /* ROL DE USUARIO */
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}