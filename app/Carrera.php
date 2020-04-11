<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table="carreras";

    protected $fillable= ['id','nombre_carrera','departamento_id','duracion','anio_plan','estado', 'imagen'];

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function materias()
    {
        return $this->belongsToMany('App\Materia')->using('App\MateriaCarrera')->withPivot('anio', 'estado')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('libreta','anio_ingreso', 'estado')->withTimestamps();
    }
}
