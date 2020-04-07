<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
	protected $table="departamentos";

    protected $fillable= ['id','nombre_dpto','logo','estado'];

    public function carreras()
    {
        return $this->hasMany('App\Carrera');
    }

 
 	public function scopeSearchDepartamento($query,$id)
    {
		return $query->where('id','=',$id);
    }

    public function scopeSearchDepartamentoName($query,$name)
    {
		return $query->where('nombre_dpto','LIKE',"%".$name."%");
	  }
}
