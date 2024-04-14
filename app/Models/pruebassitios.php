<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pruebassitios extends Model
{
    use HasFactory;

    protected $table = 'tbl_pruebas_sitios';


    public function pruebaRel()
    {
        return $this->belongsTo('App\Models\pruebas', 'id_prueba', 'id');
    }

    public function sitioRel()
    {
        return $this->belongsTo('App\Models\sitios', 'id_sitio', 'id');
    }

}
