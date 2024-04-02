<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PruebasSitios extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_pruebas')->insert([
            'id' => 1,
            'nom_prueba' => 'Prueba1',
            'pista_prueba' => 'Pista prueba 1',
            'estado_prueba' => 1, /* ESTADO ACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_pruebas')->insert([
            'id' => 2,
            'nom_prueba' => 'Prueba2',
            'pista_prueba' => 'Pista prueba 2',
            'estado_prueba' => 1, /* ESTADO ACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_pruebas')->insert([
            'id' => 3,
            'nom_prueba' => 'Prueba3',
            'pista_prueba' => 'Pista prueba 3',
            'estado_prueba' => 1, /* ESTADO ACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_pruebas')->insert([
            'id' => 4,
            'nom_prueba' => 'Prueba4',
            'pista_prueba' => 'Pista prueba 4',
            'estado_prueba' => 1, /* ESTADO ACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_pruebas')->insert([
            'id' => 5,
            'nom_prueba' => 'Prueba5',
            'pista_prueba' => 'Pista prueba 5',
            'estado_prueba' => 0, /* ESTADO DESACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
