<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;

class VistaCarrerasController extends Controller
{
    public function mostrarVistaCarreras($id){
        $carreras = Carrera::all();

    }
}
