<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_etiquetas')->insert([
            'nom_etiqueta' => 'Monumento',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'nom_etiqueta' => 'Comida',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'nom_etiqueta' => 'Parque',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'nom_etiqueta' => 'Transporte Publico',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'nom_etiqueta' => 'Hotel',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'nom_etiqueta' => 'Museo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'nom_etiqueta' => 'Banco',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'nom_etiqueta' => 'Catedral',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_etiquetas')->insert([
            'nom_etiqueta' => 'Discoteca',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
