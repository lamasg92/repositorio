<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaginasController extends Controller
{

    public function subida()
    {
        return view('layouts.subida');
    }
    /******************************************/
    public function historial()
    {
        return view('layouts.historial');
    }
    /******************************************/
   	public function perfil()
    {
        return view('layouts.perfil');
    }
   
}