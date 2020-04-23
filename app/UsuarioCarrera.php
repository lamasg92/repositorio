<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UsuarioCarrera extends Model
{
    protected $table = "usuario_carrera";
    protected $fillable = ['id', 'user_id', 'carrera_id', 'estado', 'anio_ingreso', 'libreta'];
}
