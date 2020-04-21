<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MateriaCarrera extends Pivot
{
    protected $table="materia_carrera";

    protected $fillable= ['id','materia_id','carrera_id','anio', 'estado'];

    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }

}
