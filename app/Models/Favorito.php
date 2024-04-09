<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $table = 'tbl_favoritos'; // Nombre de la tabla en la base de datos

    protected $fillable = ['id_usuario', 'id_sitio']; // Campos que se pueden asignar de forma masiva
}
