<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
	protected $table="departamentos";

    protected $fillable= ['nombre_dpto','logo','estado'];

    public function carreras()
    {
        return $this->hasMany('App\Carrera');
    }
}
