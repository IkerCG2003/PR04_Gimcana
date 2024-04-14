<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gimcanas extends Model
{
    use HasFactory;

    protected $table = 'tbl_gimcanas';

    public function grupos() {
        return $this->belongsToMany(grupos::class,'tbl_grupos_gimcanas','id_grupo','id_gimcana');
    }
}
