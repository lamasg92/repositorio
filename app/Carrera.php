<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table="carreras";

    protected $fillable= ['nombre_carrera','slug_carrera','departamento_id','anio_plan','imagen','duracion','estado'];

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function materias()
    {
        return $this->belongsToMany('App\Materia','materia_carrera')->using('App\MateriaCarrera')->withPivot('anio', 'estado')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('libreta','anio_ingreso', 'estado')->withTimestamps();
    }

  

}