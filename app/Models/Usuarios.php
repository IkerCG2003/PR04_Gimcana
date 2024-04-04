<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'tbl_usuarios';

    protected $fillable = [
        'nom_usuario',
        'apell_usuario',
        'email_usuario',
        'pwd_usuario',
        'rol_usuario',
    ];

    protected $hidden = [
        'pwd_usuario',
    ];
}