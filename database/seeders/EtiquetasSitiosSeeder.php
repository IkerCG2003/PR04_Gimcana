<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetasSitiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_etiquetas_sitios')->insert([
            'id_etiqueta' => 1,
            'id_sitio' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_sitios')->insert([
            'id_etiqueta' => 5,
            'id_sitio' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_sitios')->insert([
            'id_etiqueta' => 7,
            'id_sitio' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_sitios')->insert([
            'id_etiqueta' => 2,
            'id_sitio' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_sitios')->insert([
            'id_etiqueta' => 7,
            'id_sitio' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_sitios')->insert([
            'id_etiqueta' => 4,
            'id_sitio' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_sitios')->insert([
            'id_etiqueta' => 3,
            'id_sitio' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas_sitios')->insert([
            'id_etiqueta' => 8,
            'id_sitio' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
