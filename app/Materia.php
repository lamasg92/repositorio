<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Carrera;

class Materia extends Model
{
    protected $table="materias";

    protected $fillable= ['id','nombre_materia','slug_materia','semestre','tipo','estado'];

    public function carreras()
    {
        return $this->belongsToMany('App\Carrera','materia_carrera')->using('App\MateriaCarrera')->withPivot('anio', 'estado')->withTimestamps();
    }
   
    public function apuntes()
    {
        return $this->hasMany('App\Apunte');
    }

     public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }

    public static function selectCarreras($id){
      
      return Carrera::where('departamento_id','=', $id)->get();

    }
    
}