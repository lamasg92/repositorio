<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection; 
use App\Apunte;
use App\Carrera;
use App\MateriaDocente;
use App\Http\Requests\ApunteRequest;


class ApuntesController extends Controller
{
    public function create()
    {
        $user=Auth::user();
        $materiasdocente = MateriaDocente::where('user_id','=', $user->id)
        ->join('materia_carrera','materia_carrera.id','=','materia_docente.materia_carrera_id')
        ->join('materias','materias.id','=','materia_carrera.materia_id')
        ->select('materia_carrera.id','materias.nombre_materia')->get();
        return view('home.subida', ['materiasdocente' => $materiasdocente]); 

    }

    public function index()
    {
        $user=Auth::user();
        $apuntesdocente = Apunte::where([['user_id','=', $user->id],['apuntes.estado','=','activo']])
        ->join('materias','materias.id','=','apuntes.materia_id')
        ->select('apuntes.id','apuntes.nombre_apunte','apuntes.materia_id','apuntes.archivo','apuntes.autores','apuntes.created_at','materias.nombre_materia')->get();
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

    public function datos($id_apunte)
    {
        $datosapunte = Apunte::where('apuntes.id',$id_apunte)->join('materias','materias.id','=','apuntes.materia_id')->select('apuntes.id','apuntes.nombre_apunte','apuntes.materia_id','apuntes.archivo','apuntes.autores','materias.nombre_materia')->get();
        //return $datosapunte;
        $user=Auth::user();
        $materiasdocente=MateriaDocente::where('user_id','=', $user->id)
        ->join('materia_carrera','materia_carrera.id','=','materia_docente.materia_carrera_id')
        ->join('materias','materias.id','=','materia_carrera.materia_id')
        ->select('materia_carrera.id','materias.nombre_materia')->get();
        return view('home.modificar',['datosapunte' => $datosapunte, 'materiasdocente' => $materiasdocente]);
    }

    public function show($nombre, $carrera, $materia,$apunte){
        
        $carrera = Carrera::where('slug_carrera', $carrera)->first();
        $apunte = Apunte::where('nombre_apunte', $apunte)->first();

        return view('home.showApunte')->with([
            'apunte' => $apunte,
            'carrera' => $carrera,
            'materia' => $apunte->materia,
            'dpto' => $carrera->departamento,
        ]);

    }

    public function update($id_apunte, request $request)
    {
        Apunte::where('id', $id_apunte)->update( array('nombre_apunte'=>$request->input('nombre_apunte'),'materia_id'=>$request->input('materia_id'),'autores'=>$request->input('autores')));

        return redirect()->route('historial'); 
    }

    public function eliminar($id_apunte)
    {
        Apunte::where('id', $id_apunte)->update( array('estado'=>'inactivo'));

        return redirect()->route('historial'); 
    }

}