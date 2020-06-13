<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection; 
use App\Apunte;
use App\Carrera;
use App\Favorito;
use App\MateriaDocente;
use App\Http\Requests\ApunteRequest;


class ApuntesController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $apuntesdocente = Apunte::where([['user_id','=', $user->id]])
        ->join('materias','materias.id','=','apuntes.materia_id')
        ->select('apuntes.id','apuntes.nombre_apunte','apuntes.materia_id','apuntes.archivo','apuntes.autores','apuntes.estado','apuntes.created_at','materias.nombre_materia')->get();

        return view('home.historial', ['apuntesdocente' => $apuntesdocente]);       
    }

    public function create()
    {
        $user=Auth::user();
        $materiasdocente = $user->select('m.id','nombre_materia')
                            ->join('materia_docente as md','md.user_id','=','users.id')
                            ->join('materias as m','m.id','=','md.materia_id')
                            ->where('md.estado','=','activo')
                            ->groupBy('m.id')->get();                            
        return view('home.subida', ['materiasdocente' => $materiasdocente]); 

    }

    public function store(ApunteRequest $request)
    {     

        $existe_apunte = Apunte::where('nombre_apunte','=',$request->nombre_apunte)->first();
        if(!$existe_apunte)
        {
            $user=Auth::user();
            $apunte = new Apunte($request->all());
            if($request->file('archivo'))
            {
                $archivo = $request->file('archivo');
                $tipo = $archivo->getClientMimeType();  
                $apunte->tipo_archivo = $tipo;
                
                $nombre_archivo = $request->nombre_apunte.' - '.$apunte->materia->nombre_materia.'.'. substr($tipo,-3);
                $path=public_path().'/apuntes/';
                $archivo->move($path,$nombre_archivo);
                $apunte->archivo = $nombre_archivo;             
            } 
            $apunte->user_id = $user->id;
            $apunte->estado = 'activo';
            $apunte->save();

            flash("El apunte ". $apunte->nombre_apunte . " ha sido subido con exito." , 'success')->important();
        }
        else
        {
            flash("Ya existe un apunte con el mismo nombre." , 'success')->important();

        }    

        return redirect()->route('subida');
    }

  
    public function datos($id_apunte)
    {
        $datosapunte = Apunte::where('apuntes.id',$id_apunte)->join('materias','materias.id','=','apuntes.materia_id')->select('apuntes.id','apuntes.nombre_apunte','apuntes.materia_id','apuntes.archivo','apuntes.autores','materias.nombre_materia')->get();
        //return $datosapunte;
        $user=Auth::user();
        $materiasdocente = $user->select('m.id','nombre_materia')
                            ->join('materia_docente as md','md.user_id','=','users.id')
                            ->join('materias as m','m.id','=','md.materia_id')
                            ->where('md.estado','=','activo')
                            ->groupBy('m.id')->get(); 
        return view('home.modificar',['datosapunte' => $datosapunte, 'materiasdocente' => $materiasdocente]);
    }

    public function show($nombre, $carrera, $materia,$apunte){
        $user=Auth::user();
        $carrera = Carrera::where('slug_carrera', $carrera)->first();
        $apunte = Apunte::where('nombre_apunte', $apunte)->first();
        $favorito = Favorito::where('user_id','=', $user->id)
        ->where('apunte_id','=',$apunte->id)
        ->where('estado','=','activo')
        ->get();

        return view('home.showApunte')->with([
            'apunte' => $apunte,
            'carrera' => $carrera,
            'materia' => $apunte->materia,
            'dpto' => $carrera->departamento,
            'favorito' => $favorito,
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