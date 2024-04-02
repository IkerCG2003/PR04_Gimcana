<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_sitios')->insert([
            'id' => 1,
            'nom_sitio' => 'Sitio1',
            'ubi_sitio' => '41.379028624403865, 2.126041492842137',
            'ico_sitio' => 'sitio1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'id' => 2,
            'nom_sitio' => 'Sitio2',
            'ubi_sitio' => '41.379028624403865, 2.126041492842137',
            'ico_sitio' => 'sitio2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'id' => 3,
            'nom_sitio' => 'Sitio3',
            'ubi_sitio' => '41.379028624403865, 2.126041492842137',
            'ico_sitio' => 'sitio3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'id' => 4,
            'nom_sitio' => 'Sitio4',
            'ubi_sitio' => '41.379028624403865, 2.126041492842137',
            'ico_sitio' => 'sitio4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
