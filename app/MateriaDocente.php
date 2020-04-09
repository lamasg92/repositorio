<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MateriaDocente extends Pivot
{
    protected $table = "materia_docente";
    protected $fillable= ['id','user_id','materia_carrera_id','estado'];
}
