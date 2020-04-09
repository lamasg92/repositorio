<?php

namespace App\Http\Controllers;

use App\MateriaDocente;
use Illuminate\Http\Request;

class MateriasDocenteController extends Controller
{
    public function index()
    {
        $materiasdocente = MateriaDocente::all();
        //return view('layouts.subida') -> with('materiasdocente', $materiasdocente);
        return view('layouts.subida') -> with('materiasdocente', $materiasdocente);
        //dd('materiasdocente');
    
    }
}
