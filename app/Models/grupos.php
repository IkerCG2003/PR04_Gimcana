<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupos extends Model
{
    use HasFactory;

    protected $table = 'tbl_grupos';

    public function usuario() {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }

    public function gimcanas() {
        return $this->belongsToMany(gimcanas::class,'tbl_grupos_gimcanas','id_grupo','id_gimcana');
    }
}
