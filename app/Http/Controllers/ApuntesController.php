<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection; 
use App\Apunte;
use App\MateriaDocente;


class ApuntesController extends Controller
{
      public function index($id_user)
    {
        $apuntesdocente = Apunte::where('user_id','=', $id_user)->join('materias','materias.id','=','apuntes.materia_id')->get();
        return view('home.historial', ['apuntesdocente' => $apuntesdocente]); 
            
    }

    public function subida()
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
        //return view('home.subida') ->with('materiasdocente', $materiasdocente);
        return redirect()->route('subida', ['id_user' => $id_user]);

    }

    /*
    public function store(Request $request)
    {
        dd($request);
        //$departamento= new Departamento($request->all());
        //$departamento->nombre_dpto=strtoupper($departamento->nombre_dpto);
        if($request->file('image'))
        {
            $file =$request->file('image');
            $extension=$file->getClientOriginalName();//nombre de img
            $path=public_path().'/images/departamento/';//donde guardamos img
            $file->move($path,$extension);//guardar imagen
            $departamento->extension=$extension;
        }
        $departamento->save();
        flash("El departamento ". $departamento->nombre_dpto . " ha sido creada con exito" , 'success')->important();

        return redirect()->route('departamento.index');
    }*/
    
}