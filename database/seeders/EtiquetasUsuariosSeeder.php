<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetasUsuariosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_etiquetas_usuarios')->insert([
            'nombre_etiqueta' => 'EtiquetaPers1',
            'id_usuario' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_usuarios')->insert([
            'nombre_etiqueta' => 'EtiquetaPers2',
            'id_usuario' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_usuarios')->insert([
            'nombre_etiqueta' => 'EtiquetaPers3',
            'id_usuario' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}