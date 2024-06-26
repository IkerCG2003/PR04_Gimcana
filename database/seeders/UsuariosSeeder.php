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
            'nom_usuario' => 'admin',
            'apell_usuario' => 'admin',
            'email_usuario' => 'admin@gmail.com',
            'pwd_usuario' => bcrypt('qweQWE123'),
            'rol_usuario' => 0, /* ROL DE ADMIN */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_usuarios')->insert([
            'nom_usuario' => 'Polmarc',
            'apell_usuario' => 'Montero Roca',
            'email_usuario' => 'polmarc@gmail.com',
            'pwd_usuario' => bcrypt('qweQWE123'),
            'rol_usuario' => 1, /* ROL DE USUARIO */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_usuarios')->insert([
            'nom_usuario' => 'Iker',
            'apell_usuario' => 'Catalan',
            'email_usuario' => 'ikercatalan@gmail.com',
            'pwd_usuario' => bcrypt('qweQWE123'),
            'rol_usuario' => 1, /* ROL DE USUARIO */
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}