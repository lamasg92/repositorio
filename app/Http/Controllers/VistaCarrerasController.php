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
        switch ($nombre) {
            case '1':
                  $name = "Departamento de Informática";
                break;
            case '2':
                  $name = "Departamento de Matemática";
                break;
            
            case '3':
                  $name = "Departamento de Química";
                break;

            case '4':
                  $name = "Departamento de Física";
                break;
        }

        $carreras = Carrera::where('departamento_id', '=', $nombre)->get();

        //$id = $departamentos->id;
        //foreach($carreras as $car){
        //    echo 'ID:'.$car->nombre_carrera. '<br/>';
        //}
        //$carreras = Carrera::all();
        //$carreras = Carrera::where('departamento_id', '==', $id);

       return view('home.vistaCarreras')->with([
                'carreras' => $carreras,
                'elnombredpto' => $name,
       ]);
        
    }
}
