<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apunte;
use App\Materia;
use App\Carrera;

class VistaApuntesController extends Controller
{
    public function mostrarVistaApuntes($nombre, $carrera, $materia){
    	
        $materia = Materia::where('slug_materia', $materia)->first();
    	$carrera = Carrera::where('slug_carrera', $carrera)->first();
    	$apuntes = Apunte::where('materia_id', $materia->id)->get();

    	return view('home.vistaApuntes')->with([
    		'apuntes' => $apuntes,
    		'carrera' => $carrera,
    		'materia' => $materia,
    		'dpto' => $carrera->departamento,
    	]);

    }
}
