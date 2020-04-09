<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection; 
use App\Apunte;
use App\MateriaDocente;

class ApuntesController extends Controller
{
    public function index(Request $request)
    {
       
    }

    public function subida()
    {
        $user=Auth::user();
        $materiacarreras=$user->materia_carreras;
        $materiasdocente= new Collection();
        foreach ($materiacarreras as $materiacarrera) {
            $materiasdocente->prepend($materiacarrera->materia);
        }

        return view('home.subida') ->with('materiasdocente', $materiasdocente);

    }

  
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
    }
    
    
}