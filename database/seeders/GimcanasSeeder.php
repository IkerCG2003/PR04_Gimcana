<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GimcanasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_gimcanas')->insert([
            'nombre_gimcana' => 'Gimcana1',
            'descripcion_gimcana' => 'Gimcana 1 descrip',
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_gimcanas')->insert([
            'nombre_gimcana' => 'Gimcana2',
            'descripcion_gimcana' => 'Gimcana 2 descrip',
            'estado' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
