<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favoritos extends Model
{
    use HasFactory;

    protected $table = 'tbl_favoritos';

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuarios', 'id_usuario', 'id');
    }

    public function sitioRel()
    {
        return $this->belongsTo('App\Models\sitios', 'id_sitio', 'id');
    }
}