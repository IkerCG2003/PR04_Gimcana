<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etiquetassitios extends Model
{
    use HasFactory;

    protected $table = 'tbl_etiquetas_sitios';

    public function sitioRel()
    {
        return $this->belongsTo('App\Models\sitios', 'id_sitio', 'id');
    }

    public function etiquetaRel()
    {
        return $this->belongsTo('App\Models\etiquetas', 'id_etiqueta', 'id');
    }

    
}
