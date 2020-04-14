<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Materia;

class VistaMateriasController extends Controller
{
    public function mostrarVistaMaterias($nombre, $carrera){

    	//$materias = Carrera::find(3)->materias()->get();
    	$carrera = Carrera::where('slug_carrera', $carrera)->first();

    	$materias = Materia::join("materia_carrera","materias.id","=","materia_carrera.materia_id")
    	->where('materia_carrera.carrera_id','=',$carrera->id)
    	->select('materias.id','materias.nombre_materia', 'materias.semestre', 'materias.tipo', 'materia_carrera.anio','materias.slug_materia')
    	->orderBy('materia_carrera.anio','asc')
    	->get();
    	
    	return view('home.vistaMat')->with([
    		'materias' => $materias,
    		'dpto' => $carrera->departamento,
    		'carrera' => $carrera,
    	]);

    }
}
