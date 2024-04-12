<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PruebasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_pruebas')->insert([
            'nom_prueba' => 'Primera prueba',
            'pista_prueba' => 'Encuentra el lugar donde los libros son tesoros y los pupitres son barcos que navegan por mares de conocimiento. Busca una placa con el nombre de un filósofo español que da la bienvenida a los estudiantes en la entrada principal. Ahí es donde encontrarás tu siguiente pista.',
            'estado_prueba' => 1, /* ESTADO ACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_pruebas')->insert([
            'nom_prueba' => 'Segunda prueba',
            'pista_prueba' => 'En este punto de partida y llegada local, los viajeros se cruzan en un ir y venir constante, buscando destinos lejanos o regresando a casa. Encuentra el lugar donde los trenes rugen como bestias metálicas y los pasajeros se convierten en aventureros urbanos.',
            'estado_prueba' => 0, /* ESTADO ACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_pruebas')->insert([
            'nom_prueba' => 'Tercera prueba',
            'pista_prueba' => 'En este lugar de encuentro cultural, las artes se entrelazan como hilos de colores en un telar, tejiendo la diversidad y la creatividad de la comunidad. Busca el espacio donde las palabras se convierten en poesía, los colores cobran vida y la música se convierte en melodía.',
            'estado_prueba' => 0, /* ESTADO ACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_pruebas')->insert([
            'nom_prueba' => 'Cuarta prueba',
            'pista_prueba' => 'En este lugar subterráneo, las líneas de la ciudad se entrelazan como venas que conectan el corazón de Barcelona. Busca el punto donde los trenes rugen como dragones metálicos y los pasajeros son como viajeros en una odisea urbana.',
            'estado_prueba' => 0, /* ESTADO ACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_pruebas')->insert([
            'nom_prueba' => 'Quinta prueba',
            'pista_prueba' => 'En este oasis verde en medio del bullicio urbano, una figura de bronce se alza en un equilibrio perpetuo, recordándonos la armonía entre la naturaleza y la creatividad humana. Busca el punto donde la escultura se convierte en un símbolo de estabilidad y movimiento',
            'estado_prueba' => 0, /* ESTADO DESACTIVADA */
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
