<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Request;

class PaginasController extends Controller
{

   	public function index()
    {
        //return Request::input('imagen');
        //return Request::input('carrera');
        //return Request::input('ingreso');
        //return Request::input('lu');
        return view('home.temporal');
    }
   
}