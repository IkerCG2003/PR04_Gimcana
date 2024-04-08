<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GruposSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_grupos')->insert([
            'numero_grupo' => '1',
            'nombre_grupo' => 'Grupo1',
            'capacidad_grupo' => '4',
            'id_usuario' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_grupos')->insert([
            'numero_grupo' => '2',
            'nombre_grupo' => 'Grupo2',
            'capacidad_grupo' => '3',
            'id_usuario' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
