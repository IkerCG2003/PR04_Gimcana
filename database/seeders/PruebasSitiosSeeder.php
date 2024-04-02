<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PruebasSitiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_pruebas_sitios')->insert([
            'id_prueba' => 1,
            'id_sitio' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
