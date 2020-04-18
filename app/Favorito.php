<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Favorito extends Pivot
{
    protected $table="favoritos";

    protected $fillable= ['id','user_id','apunte_id','carrera_id', 'estado'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function apunte()
    {
        return $this->belongsTo('App\Apunte');
    }
}
