<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Departamento;

class VistaCarrerasController extends Controller
{
    public function mostrarVistaCarreras($nombre){
        $dpto = Departamento::where('slug_dpto','=',$nombre)->first();

        $carreras = Carrera::where('departamento_id', '=', $dpto->id)->get();

        return view('home.vistaCarreras')->with([
                'carreras' => $carreras,
                'dpto' => $dpto,
       ]);
        
    }
}
