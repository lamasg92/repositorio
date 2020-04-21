<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apunte extends Model
{
	protected $table="apuntes";

    protected $fillable= ['nombre_apunte','materia_id','user_id','archivo','tipo_archivo','autores','estado'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function materia()
    {
        return $this->belongsTo('App\Materia');
    }

  

}
