<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pruebas extends Model
{
    use HasFactory;

    protected $table = 'tbl_pruebas';

    public function sitios() {
        return $this->belongsToMany(sitios::class,'tbl_pruebas_sitios','id_prueba','id_sitio');
    }

}
