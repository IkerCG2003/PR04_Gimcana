<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuariosgrupos extends Model
{
    use HasFactory;

    protected $table = 'tbl_usuarios_grupos';

    public function usuarioRel()
    {
        return $this->belongsTo('App\Models\Usuarios', 'id_usuario', 'id');
    }

    public function grupoRel()
    {
        return $this->belongsTo('App\Models\grupos', 'id_grupo', 'id');
    }
}