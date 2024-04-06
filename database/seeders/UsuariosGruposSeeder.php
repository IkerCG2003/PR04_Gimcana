<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PruebasSitiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_usuarios_grupos')->insert([
            'id_usuario' => 2,
            'id_grupo' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
