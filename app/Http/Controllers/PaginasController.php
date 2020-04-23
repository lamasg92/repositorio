<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apunte;
use App\Materia;
use App\Carrera;
use App\Departamento;

class PaginasController extends Controller
{
	public function mostrarVistaCarreras($nombre){
        $dpto = Departamento::where('slug_dpto','=',$nombre)->first();

        $carreras = Carrera::where('departamento_id', '=', $dpto->id)->get();

        return view('home.vistaCarreras')->with([
                'carreras' => $carreras,
                'dpto' => $dpto,
       ]);
        
    }

    public function mostrarVistaMaterias($nombre, $carrera)
    {
    	$carrera = Carrera::where('slug_carrera', $carrera)->first();

    	$materias = Materia::join("materia_carrera","materias.id","=","materia_carrera.materia_id")
    	->where('materia_carrera.carrera_id','=',$carrera->id)
    	->select('materias.id','materias.nombre_materia', 'materias.semestre', 'materias.tipo', 'materia_carrera.anio','materias.slug_materia')
    	->orderBy('materia_carrera.anio','asc')
        ->orderBy('materias.semestre','asc')
    	->get();
    	
    	return view('home.vistaMaterias')->with([
    		'materias' => $materias,
    		'dpto' => $carrera->departamento,
    		'carrera' => $carrera,
    	]);

    }

    public function mostrarVistaApuntes($nombre, $carrera, $materia)
    {
        $materia = Materia::where('slug_materia', $materia)->first();
    	$carrera = Carrera::where('slug_carrera', $carrera)->first();
    	$apuntes = Apunte::where('materia_id', $materia->id)
        ->where('estado','=','activo')
        ->get();

    	return view('home.vistaApuntes')->with([
    		'apuntes' => $apuntes,
    		'carrera' => $carrera,
    		'materia' => $materia,
    		'dpto' => $carrera->departamento,
    	]);

    }
   
}