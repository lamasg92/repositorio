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
        return $this->belongsToMany('App\User','materia_docente','user_id','materia_carrera_id')->withPivot('estado')->withTimestamps();
    }

    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }

}
