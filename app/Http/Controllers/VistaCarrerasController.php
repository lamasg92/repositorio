<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Departamento;

class VistaCarrerasController extends Controller
{
    public function mostrarVistaCarreras($nombre){
        //$departamentos = Departamento::all();
        
        //$departamentos = Departamento::where('nombre_dpto', '==', $nombre);

        $carreras = Carrera::where('departamento_id', '=', $nombre)->get();

        //$id = $departamentos->id;
        //foreach($carreras as $car){
        //    echo 'ID:'.$car->nombre_carrera. '<br/>';
        //}
        //$carreras = Carrera::all();
        //$carreras = Carrera::where('departamento_id', '==', $id);

       return view('home.vistaCarreras')->with('carreras',$carreras);
        
    }
}
