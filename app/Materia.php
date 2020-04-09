<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table="materias";

    protected $fillable= ['id','nombre_materia','semestre','tipo','estado'];

    public function carreras()
    {
        return $this->belongsToMany('App\Carrera')->using('App\MateriaCarrera')->withPivot('anio', 'estado')->withTimestamps();
    }

	public function apuntes()
    {
        return $this->hasMany('App\Apuntes');
    }
    
}
