<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetasSitiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_etiquetas')->insert([
            'id' => 1,
            'nom_etiqueta' => 'Monumento',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'id' => 2,
            'nom_etiqueta' => 'Comida',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'id' => 3,
            'nom_etiqueta' => 'Parque',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'id' => 4,
            'nom_etiqueta' => 'Transporte Publico',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'id' => 5,
            'nom_etiqueta' => 'Hotel',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'id' => 6,
            'nom_etiqueta' => 'Museo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'id' => 7,
            'nom_etiqueta' => 'Banco',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'id' => 8,
            'nom_etiqueta' => 'Catedral',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'id' => 9,
            'nom_etiqueta' => 'Discoteca',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
