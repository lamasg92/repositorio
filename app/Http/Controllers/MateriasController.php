<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carrera;

use App\Materia;

use App\Departamento;

use App\MateriaCarrera;

use App\Http\Requests\MateriaRequest;
use Illuminate\Support\Facades\DB;

class MateriasController extends Controller
{
    
    public function index(Request $request)
    {
       
         $materias= DB::table('materia_carrera as mc')
              ->join('materias as m','mc.materia_id','=','m.id')
              ->join('carreras as c','mc.carrera_id','=','c.id')
              ->paginate(10);

        return view('admin.materia.index')
                    ->with('materias',$materias);
        
        }           


     public function create()
    {
          $departamentos=Departamento::where('estado','=','activo')->orderBy('nombre_dpto','ASC')->pluck('nombre_dpto','id')->ToArray();

          $carreras=Carrera::where('estado','=','activo')->orderBy('nombre_carrera','ASC')->pluck('nombre_carrera','id')->ToArray();

        return view('admin.materia.create')->with('departamentos',$departamentos)
                                             ->with('carreras',$carreras);
    
       }

    
    public function store(MateriaRequest $request)
    { 
      $materia= new Materia($request->all());
      $materia->save();
      $cont = 0;
      while ( $cont < count($request->carreras) ) {
          $materia->carreras()->attach($request->carreras[$cont],
            [ 'anio' => $request->anio,
              'estado' => 'activo'
          ]);
          $cont++;
      }

      flash("La materia ". $materia->nombre_materia . " ha sido registrado con exito" , 'success')->important();

      return redirect()->route('materias.index');

    }                    

      public function show($id)
    {
        //
    }
          
      
        public function getCarreras( Request $request ,$id){
        

                  
              if ($request->ajax()) {
                 $carreras=Materia::selectCarreras($id);
                $rdo=response()->json($carreras);
                
                  return $rdo;


             
              }
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