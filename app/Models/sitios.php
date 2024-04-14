<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sitios extends Model
{
    use HasFactory;

    protected $table = 'tbl_sitios';

    public function etiquetas() {
        return $this->belongsToMany(etiquetas::class,'tbl_etiquetas_sitios','id_etiqueta','id_sitio');
    }

    public function pruebas() {
        return $this->belongsToMany(pruebas::class,'tbl_pruebas_sitios','id_prueba','id_sitio');
    }
}
