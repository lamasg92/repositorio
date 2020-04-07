<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MateriaCarrera extends Pivot
{
    protected $table="materia_carrera";

    protected $fillable= ['materia_id','carrera_id','anio', 'estado'];

    public function users()
    {
        return $this->belongsToMany('App\User','materia_docente')->withPivot('estado')->withTimestamps();
    }
}
