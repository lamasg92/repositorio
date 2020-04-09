<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaginasController extends Controller
{

    public function subida()
    {
        return view('home.subida');
    }
    /******************************************/
    public function historial()
    {
        return view('home.historial');
    }
    /******************************************/
   	public function perfil()
    {
        return view('home.perfil');
    }
   
}