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
        $materias= new Materia($request->all());

        $materias->save();

        $materias2= new MateriaCarrera($request->all());
        
       $materias2->materia_id=$materias->id;

       $materias2->estado=$materias->estado;
       
        
         $materias2->save();
         flash("La materia ". $materias->nombre_materia . " ha sido registrado con exito" , 'success')->important();
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
  
}