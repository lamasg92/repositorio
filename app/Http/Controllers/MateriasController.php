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
              ->select('mc.id','m.nombre_materia','m.semestre','m.tipo','c.nombre_carrera','mc.anio','mc.estado','mc.materia_id','mc.carrera_id')
              ->paginate(10);

              

             
        return view('admin.materia.index')->with('materias',$materias);
        
        }           


     public function create()
    {
         
          $carreras=Carrera::where('estado','=','activo')->orderBy('nombre_carrera','ASC')->pluck('nombre_carrera','id')->ToArray();


        return view('admin.materia.create')->with('carreras',$carreras);
    
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

            
  public function edit($id,$id_carrera)


    {     
        $materia= DB::table('materia_carrera as mc')
              ->join('materias as m','mc.materia_id','=','m.id')
              ->join('carreras as c','mc.carrera_id','=','c.id')
              ->select('mc.id','m.nombre_materia','m.semestre','m.tipo','c.nombre_carrera','mc.anio','mc.estado','mc.materia_id','mc.carrera_id')
               -> where('mc.materia_id','=',$id)
              ->where('mc.carrera_id','=',$id_carrera)
              ->first();
            

          $carreras=Carrera::where('estado','=','activo')->orderBy('nombre_carrera','ASC')->pluck('nombre_carrera','id')->ToArray();


        return view('admin.materia.edit')->with('materia',$materia)
                                        ->with('carreras',$carreras);
                                                                  
    }

    
    public function update(Request $request, $idmateria,$id)
    {

     

        $materia=Materia::find($idmateria);
        $materia->fill($request->all());
        $materia->save();
        $materiacarrera= MateriaCarrera::where('id','=',$id)->first();
        $materiacarrera->anio=$request->anio;
                      
   
        $materiacarrera->save();
        flash("La materia  ". $materia->nombre_materia . " ha sido modificada con exito" , 'success')->important();
        return redirect()->route('materias.index');
    }

    public function desable($id, $id_carrera)
    {
        $materia= MateriaCarrera::where('materia_id','=',$id)
              ->where('carrera_id','=',$id_carrera)
              ->first();
          
             
        $materia->estado='inactivo';
        $materia->save();
        return redirect()->route('materias.index');
    }

     public function enable($id,$id_carrera)
    {

        $materia= MateriaCarrera::where('materia_id','=',$id)
                  ->where('carrera_id','=',$id_carrera)
                  ->first();
          
             
        $materia->estado='activo';
        $materia->save();
        return redirect()->route('materias.index');
    }

    
  
}