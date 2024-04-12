<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GruposGimcanasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_grupos_gimcanas')->insert([
            'id_grupo' => 1,
            'id_gimcana' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_grupos_gimcanas')->insert([
            'id_grupo' => 1,
            'id_gimcana' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_grupos_gimcanas')->insert([
            'id_grupo' => 1,
            'id_gimcana' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_grupos_gimcanas')->insert([
            'id_grupo' => 1,
            'id_gimcana' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_grupos_gimcanas')->insert([
            'id_grupo' => 2,
            'id_gimcana' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_grupos_gimcanas')->insert([
            'id_grupo' => 2,
            'id_gimcana' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
