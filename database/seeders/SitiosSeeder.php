<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Café Alonso',
            'latitud' => 41.349252649956874,
            'longitud' => 2.1075779199600224, 
            'ico_sitio' => 'sitio1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Caprabo',
            'latitud' => 41.34841797892616,
            'longitud' => 2.107935352230124, 
            'ico_sitio' => 'sitio2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Bodega Bar Ermita',
            'latitud' => 41.34892954464191, 
            'longitud' => 2.1072421649185955, 
            'ico_sitio' => 'sitio3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Parroquia de Nuestra Señora de Bellvitge',
            'latitud' => 41.34924534871412,
            'longitud' => 2.10823940146935, 
            'ico_sitio' => 'sitio5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Escola Ramón Muntaner',
            'latitud' => 41.34911665768707,
            'longitud' => 2.1089584780538666, 
            'ico_sitio' => 'sitio6',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
