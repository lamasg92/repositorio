<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Materia;

class VistaMateriasController extends Controller
{
    public function mostrarVistaMaterias($idCar, $nombDpto){

    	//$materias = Carrera::find(3)->materias()->get();
    	$carreras = Carrera::where('id', $idCar)->get();
    	foreach ($carreras as $value) {
    		$nombCarr = $value->nombre_carrera;
    	}
    	$materias = Materia::join("materia_carrera","materias.id","=","materia_carrera.materia_id")
    	->where('materia_carrera.carrera_id','=',$idCar)
    	->select('materias.id','materias.nombre_materia', 'materias.semestre', 'materias.tipo', 'materia_carrera.anio')
    	->orderBy('materia_carrera.anio','asc')
    	->get();
    	
    	return view('home.vistaMat')->with([
    		'materias' => $materias,
    		'nombDpto' => $nombDpto,
    		'nombCarr' => $nombCarr,
    		'idCarr' => $idCar,
    	]);

    }
}
