<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetasUsuariosSitiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_etiquetas_usuarios_sitios')->insert([
            'id_etiqueta_usuario' => 1,
            'id_sitio' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_usuarios_sitios')->insert([
            'id_etiqueta_usuario' => 2,
            'id_sitio' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_usuarios_sitios')->insert([
            'id_etiqueta_usuario' => 2,
            'id_sitio' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
