<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Polideportivo Municipal Bellvitge Sergio Manzano',
            'latitud' => 41.34870407, 
            'longitud' => 2.10316086, 
            'ico_sitio' => 'HOTEL',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Metropolitan Gran Vía',
            'latitud' => 41.34698045, 
            'longitud' => 2.11069250, 
            'ico_sitio' => 'MONUMENTO',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Hospital Universitario de Bellvitge',
            'latitud' => 41.34506472, 
            'longitud' => 2.10586769, 
            'ico_sitio' => 'DISCOTECA',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Parque de Bellvitge',
            'latitud' => 41.34869964, 
            'longitud' => 2.11187429, 
            'ico_sitio' => 'PARQUE',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}