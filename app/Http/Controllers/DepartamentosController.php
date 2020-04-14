<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Departamento;

use App\Http\Requests\DepartamentoRequest;

class DepartamentosController extends Controller
{
    public function index(Request $request)
    {
        $departamentos=Departamento::paginate(10);

        return view('admin.departamento.index')
                    ->with('departamentos',$departamentos);
    }

    public function create()
    {
        return view('admin.departamento.create');
    }

  
    public function store(DepartamentoRequest $request)
    {
        $departamento= new Departamento($request->all());
        $departamento->nombre_dpto=strtoupper($departamento->nombre_dpto);
        if($request->file('imagen')){
            $file =$request->file('imagen');
            $logo=$file->getClientOriginalName();//nombre de img
            $path=public_path().'/images/departamento/';//donde guardamos img
            $file->move($path,$logo);//guardar imagen
            $departamento->logo=$logo;
        }
        $departamento->save();
        flash("El departamento ". $departamento->nombre_dpto . " ha sido creada con exito" , 'success')->important();

        return redirect()->route('departamentos.index');
    }


    
    
}