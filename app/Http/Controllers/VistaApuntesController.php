<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apunte;
use App\Materia;

class VistaApuntesController extends Controller
{
    public function mostrarVistaApuntes($idMat, $nombDpto, $nombCarr, $idCarr){
    	$materias = Materia::where('id', $idMat)->get();
    	foreach ($materias as $value) {
    		$nombMat = $value->nombre_materia;
    	}
    	$apuntes = Apunte::where('materia_id', $idMat)->get();

    	return view('home.vistaApuntes')->with([
    		'apuntes' => $apuntes,
    		'idCarr' => $idCarr,
    		'nombMat' => $nombMat,
    		'nombDpto' => $nombDpto,
    		'nombCarr' => $nombCarr,
    	]);

    }
}
