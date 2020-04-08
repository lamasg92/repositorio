<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class VistaDeptosController extends Controller
{
    public function mostrarVistaDptos(){
        $departamentos = Departamento::all();

        //foreach($departamentos as $depa){
          //  echo $depa->nombre_depto . '<br/>';
        //}
        return view('home.vistaDptos')->with('departamentos',$departamentos);
    }
}
