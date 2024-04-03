<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_usuarios')->insert([
            'nom_usuario' => 'Adrian',
            'apell_usuario' => 'Vazquez Pascuas',
            'email_usuario' => 'adrianvazquez@gmail.com',
            'pwd_usuario' => bcrypt('qweQWE123'),
            'rol_usuario' => 0, // ROL DE ADMIN
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tbl_usuarios')->insert([
            'nom_usuario' => 'Polmarc',
            'apell_usuario' => 'Montero Roca',
            'email_usuario' => 'polmarc@gmail.com',
            'pwd_usuario' => bcrypt('qweQWE123'),
            'rol_usuario' => 1, // ROL DE USUARIO
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tbl_usuarios')->insert([
            'nom_usuario' => 'Iker',
            'apell_usuario' => 'Catalan',
            'email_usuario' => 'ikercatalan@gmail.com',
            'pwd_usuario' => bcrypt('qweQWE123'),
            'rol_usuario' => 1, // ROL DE USUARIO
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
