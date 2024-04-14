<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etiquetas extends Model
{
    use HasFactory;

    protected $table = 'tbl_etiquetas';

    public function sitios() {
        return $this->belongsToMany(sitios::class,'tbl_etiquetas_sitios','id_etiqueta','id_sitio');
    }
}
