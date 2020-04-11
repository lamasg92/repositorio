<?php

namespace App\Http\Controllers;

use App\MateriaDocente;
//use App\MateriaCarrera;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MateriasDocenteController extends Controller
{
    public function index($id_user)
    {

        $materiasdocente = MateriaDocente::where('user_id','=', $id_user)->join('materia_carrera','materia_carrera.id','=','materia_docente.materia_carrera_id')->join('materias','materias.id','=','materia_carrera.materia_id')->select('materia_carrera.id','materias.nombre_materia')->get();
        return view('home.subida', ['materiasdocente' => $materiasdocente]); 

    }
}
