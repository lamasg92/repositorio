<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apunte;

use App\Http\Requests\Apunte;

class ApunteController extends Controller
{
    public function index(Request $request)
    {
       
    }

    public function create()
    {
        //return view('admin.departamento.create');
    }

  
    public function store(DepartamentoRequest $request)
    {
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