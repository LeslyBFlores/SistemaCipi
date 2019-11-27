<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = ['id_categoria', 'id_proceso', 'id_proyecto', 'id_user', 'documento', 'nombre_documento', 'tipo'];
}
