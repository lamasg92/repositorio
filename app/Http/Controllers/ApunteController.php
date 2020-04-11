<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apunte;

//use App\Http\Requests\Apunte;

class ApunteController extends Controller
{
      public function index($id_user)
    {
        $apuntesdocente = Apunte::where('user_id','=', $id_user)->join('materias','materias.id','=','apuntes.materia_id')->get();
        return view('home.historial', ['apuntesdocente' => $apuntesdocente]); 
            
    }

    public function create()
    {
        //return view('layouts.subida');
    }

  
    public function store($id_user, Request $request)
    {
        $apunte = new Apunte;
        $apunte->nombre_apunte = $request->input('nombre'); 
        $apunte->materia_id  = $request->input('materia'); 
        $apunte->user_id = $id_user; 
        $archivo = $request->file('archivo');
        $nombre_archivo = $archivo->getClientOriginalName();
        $archivo->move('apuntes',$nombre_archivo);
        $apunte->archivo = $nombre_archivo; 
        $tipo = $archivo->getClientMimeType();  
        $apunte->tipo_archivo = $tipo;  
        $apunte->autores = $request->input('autor'); 
        $apunte->status = 'activo';
        $apunte->save();
        //return view('home.index'); 
        return redirect()->route('subida',['id_user' => $id_user]);
    }
    
}