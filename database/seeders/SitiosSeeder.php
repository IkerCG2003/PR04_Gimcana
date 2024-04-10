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
            'descripcion' => "En este café te servirán recetas de cocina italiana. Los cocineros de Alonso's Cafe se esfuerzan al máximo para dar a sus visitantes una tierna pasta. Su sorprendente café hará que tu comida esté incluso más deliciosa, lo que, con seguridad, te hará volver.",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Caprabo',
            'latitud' => 41.34841797892616,
            'longitud' => 2.107935352230124, 
            'ico_sitio' => 'sitio2',
            'descripcion' => "Caprabo es la compañía de supermercados de referencia en Cataluña. Fundada en el año 1959, es la empresa de supermercados más antigua de España. Caprabo tiene una red de unos 300 supermercados en las zonas estratégicas de Cataluña. En la empresa trabajan más de 6.000 personas.",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Bodega Bar Ermita',
            'latitud' => 41.34892954464191, 
            'longitud' => 2.1072421649185955, 
            'ico_sitio' => 'sitio3',
            'descripcion' => "Restaurante informal, con tienda, que ofrece cocina gallega tradicional, productos agrícolas y vinos.",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Parroquia de Nuestra Señora de Bellvitge',
            'latitud' => 41.34924534871412,
            'longitud' => 2.10823940146935, 
            'ico_sitio' => 'sitio5',
            'descripcion' => "Iglesia católica en L'Hospitalet de Llobregat.",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_sitios')->insert([
            'nom_sitio' => 'Escola Ramón Muntaner',
            'latitud' => 41.34911665768707,
            'longitud' => 2.1089584780538666, 
            'ico_sitio' => 'sitio6',
            'descripcion' => "Aprendizaje del inglés desde la educación infantil. Proyecto interdisciplinar en las tres lenguas. Proyecto Science en primaria (damos contenidos de medio en lengua inglesa). Aprendizaje mediante el uso de ordenadores y tabletas digitales en grupos reducidos desde I3. Introducción a la robótica (Bee-Bots, Scratch, Lego Wedo) en los distintos niveles educativos. Aulas conectadas en red. Atención a la diversidad de necesidades educativas con el objetivo de conseguir las competencias que permitan el desarrollo personal y escolar del alumnado. Tándem científico con la asociación Funbrain. Formamos parte de la Red de escuelas sostenibles de Hospitalet para fomentar y alcanzar hábitos para ser respetuosos con el medio ambiente.",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
