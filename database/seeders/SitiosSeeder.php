<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Escola Jaume',
            'latitud' => 41.355428,
            'longitud' => 2.109697, 
            'ico_sitio' => 'sitio1',
            'descripcion' => "Escuela privada concertada, laica, cooperativa de enseñanza y pluralista. Se manifiestan apolíticos, aconfesionales y respetuosos con todas las formas de pensar. Disponen de aulas multimedia y equipadas con TAC.",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Estación de tren de Bellvitge',
            'latitud' => 41.353957,
            'longitud' => 2.115084, 
            'ico_sitio' => 'sitio2',
            'descripcion' => "Bellvitge | Gornal ​ es una estación ferroviaria situada en la ciudad española de Hospitalet de Llobregat muy cerca de Barcelona. Forma parte de las líneas R2, R2Sud y R2Nord y R15 de Rodalies de Catalunya.",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Centre Cultural Bellvitge-Gornal',
            'latitud' => 41.35140048699621, 
            'longitud' => 2.114090664567742, 
            'ico_sitio' => 'sitio3',
            'descripcion' => "El Centro Cultural Bellvitge Gornal es un equipamiento cultural, adscrito al distrito VI, que tiene como objetivos la formación de aprendizajes relacionados con las nuevas tecnologías, las artes, la salud y el ocio. También es el espacio donde toman forma varios proyectos relacionados con la música, el teatro, la danza, la imagen, la literatura y las artes plásticas.",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Metro Bellvitge',
            'latitud' => 41.351502,
            'longitud' => 2.110263, 
            'ico_sitio' => 'sitio5',
            'descripcion' => "Bellvitge Rambla Marina es una estación de la línea 1 del Metro de Barcelona.

            La estación está situada debajo la rambla Marina en Hospitalet de Llobregat y se inauguró en 1989.
            
            Bellvitge junto a Hospital de Bellvitge fueron las primeras estaciones inauguradas del metro de Barcelona en tener ascensores.
            
            En 2022, el nombre de la estación cambió de Bellvitge a Bellvitge Rambla Marina, en el seno de varios cambios de nombres de estaciones motivados por dos razones: estaciones enlazadas que unifican su nombre o estaciones no enlazadas que actualizan su nombre. Aquí se trataba del segundo caso, ya que la estación de Cercanías Renfe de la zona se llamaba también Bellvitge, la cual a su vez fue actualizada a Bellvitge/Gornal.",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Estatua Parque de Bellvitge (Consecuencias de equilibrios)',
            'latitud' => 41.34781129176029,
            'longitud' => 2.110567889029027, 
            'ico_sitio' => 'sitio6',
            'descripcion' => "“Consecuencias de equilibrios” es un monumento que el Ayuntamiento de Hospitalet y la Asociación de Vecinos de Bellvitge encargaron, por el 30 aniversario del barrio, al escultor Ferran Soriano, vi del mismo barrio",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
