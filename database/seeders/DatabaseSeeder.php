<?php

namespace Database\Seeders;

use App\Models\favoritos;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsuariosSeeder::class);
        $this->call(EtiquetasSeeder::class);
        $this->call(SitiosSeeder::class);
        $this->call(EtiquetasSitiosSeeder::class);
        $this->call(PruebasSeeder::class);
        $this->call(PruebasSitiosSeeder::class);
        $this->call(GimcanasSeeder::class);
        $this->call(GruposSeeder::class);
        $this->call(GruposGimcanasSeeder::class);
        $this->call(UsuariosGruposSeeder::class);
        $this->call(FavoritosSeeder::class);
        $this->call(EtiquetasUsuariosSeeder::class);
        $this->call(EtiquetasUsuariosSitiosSeeder::class);
    }
}
