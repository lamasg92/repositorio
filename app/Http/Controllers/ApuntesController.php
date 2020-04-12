<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection; 
use App\Apunte;
use App\MateriaDocente;
use App\Http\Requests\ApunteRequest;


class ApuntesController extends Controller
{
    public function create()
    {
        $user=Auth::user();
        $materiasdocente = MateriaDocente::where('user_id','=', $user->id)->join('materia_carrera','materia_carrera.id','=','materia_docente.materia_carrera_id')->join('materias','materias.id','=','materia_carrera.materia_id')->select('materia_carrera.id','materias.nombre_materia')->get();
        return view('home.subida', ['materiasdocente' => $materiasdocente]); 

    }

    public function index()
    {
        $user=Auth::user();
        $apuntesdocente = Apunte::where('user_id','=', $user->id)->join('materias','materias.id','=','apuntes.materia_id')->get();
        return view('home.historial', ['apuntesdocente' => $apuntesdocente]);       
    }
  
    public function store(ApunteRequest $request)
    {
        $user=Auth::user();
        $apunte = new Apunte($request->all());

        if($request->file('archivo')){
            $archivo = $request->file('archivo');
            $nombre_archivo = $archivo->getClientOriginalName();
            $archivo->move('apuntes',$nombre_archivo);
            $apunte->archivo = $nombre_archivo; 
            $tipo = $archivo->getClientMimeType();  
            $apunte->tipo_archivo = $tipo;
        } 

        $apunte->user_id = $user->id;
        $apunte->estado = 'activo';
        $apunte->save();

        flash("El apunte ". $apunte->nombre_apunte . " ha sido subido con exito." , 'success')->important();

        return redirect()->route('subida');

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