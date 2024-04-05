<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gruposgimcanas extends Model
{
    use HasFactory;

    protected $table = 'tbl_grupos_gimcanas';

    public function grupo()
    {
        return $this->belongsTo('App\Models\grupos', 'id_grupo', 'id');
    }

    public function gimcana()
    {
        return $this->belongsTo('App\Models\gimcanas', 'id_gimcana', 'id');
    }
}
