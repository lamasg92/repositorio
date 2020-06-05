<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carrera;

use App\Departamento;

use App\Http\Requests\CarreraRequest;

class CarrerasController extends Controller
{
    
    public function index(Request $request)
    {
       
        $carreras=Carrera::paginate(10);

        return view('admin.carrera.index')
                    ->with('carreras',$carreras);
      
        }                                           
      


    public function create()
    {   
       $departamentos=Departamento::where('estado','=','activo')->orderBy('nombre_dpto','ASC')->pluck('nombre_dpto','id')->ToArray();

        return view('admin.carrera.create')->with('departamentos',$departamentos);
    }

    
    public function store(CarreraRequest $request)
    { 

        $carrera= new Carrera($request->all());
        $carrera->nombre_carrera=strtoupper($carrera->nombre_carrera);
       
        if($request->file('imagen')){
            $file =$request->file('imagen');
            $imagen=$file->getClientOriginalName();//nombre de img
            $path=public_path().'/images/carrera/';//donde guardamos img
            $file->move($path,$imagen);//guardar imagen
            $carrera->imagen=$imagen;
        }

        $carrera->save();

        flash("La carrera ". $carrera->nombre_carrera . " ha sido creada con exito" , 'success')->important();

        return redirect()->route('carreras.index');
    }
      
   
  
  public function edit($id)
    {     
        $carrera=Carrera::find($id);
        $departamentos=Departamento::where('estado','=','activo')->orderBy('nombre_dpto','ASC')->pluck('nombre_dpto','id')->ToArray();

        return view('admin.carrera.edit')->with('carrera',$carrera)
                                         ->with('departamentos',$departamentos);                         
    }

    
    public function update(Request $request, $id)
    {
        $carrera=Carrera::find($id);

        $carrera->fill($request->all());
        $carrera->nombre_carrera=strtoupper($carrera->nombre_carrera);
        if($request->file('imagen')){
            $file =$request->file('imagen');
            $imagen=$file->getClientOriginalName();
            if ($imagen!=$carrera->imagen){
                $path=public_path().'/images/carrera/';
                $file->move($path,$imagen);
                $carrera->imagen=$imagen;
            }
        }

        $carrera->save();
        flash("La carrera  ". $carrera->nombre_carrera . " ha sido modificada con exito" , 'success')->important();
     
        return redirect()->route('carreras.index');
    }

    public function desable($id)
    {
        $carrera= Carrera::find($id);
        $carrera->estado='inactivo';
        $carrera->save();
        return redirect()->route('carreras.index');
    }

     public function enable($id)
    {
        $carrera= Carrera::find($id);
        $carrera->estado='activo';
        $carrera->save();
        return redirect()->route('carreras.index');
    }   


}