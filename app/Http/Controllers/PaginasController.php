<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaginasController extends Controller
{
    /******************************************/
   	public function perfil()
    {
        return view('home.perfil');
    }
   
}