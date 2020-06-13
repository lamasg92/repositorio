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
        $materias=Materia::paginate(15);
         //dd($materias);             
        return view('admin.materia.index')->with('materias',$materias);
    }           


    public function create()
    {
        $carreras=Carrera::where('estado','=','activo')->orderBy('nombre_carrera','ASC')->pluck('nombre_carrera','id')->ToArray();
        return view('admin.materia.create')->with('carreras',$carreras);
    }

    public function show($id){
      $carreras=Carrera::where('estado','=','activo')->orderBy('nombre_carrera','ASC')->get();
      $materia=Materia::find($id);
     // dd($carreras);
      return view('admin.materia.show')->with('materia',$materia)
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

            
  public function edit($id)
  {     
        $materia=Materia::find($id);
        return view('admin.materia.edit')->with('materia',$materia);
                                                                           
  }

    public function update(Request $request,$id)
    {
        $materia=Materia::find($id);
        $materia->fill($request->all());
        $materia->save();                      
   
        flash("La materia  ". $materia->nombre_materia . " ha sido modificada con exito" , 'success')->important();
        return redirect()->route('materias.show',[$id]);
    }

    public function desable($id)
    {
        $materia= Materia::find($id);  
        $materia->estado='inactivo';
        $materia->save();
        return redirect()->route('materias.index');
    }

     public function enable($id)
    {
        $materia= Materia::find($id);
        $materia->estado='activo';
        $materia->save();
        return redirect()->route('materias.index');
    }

    public function deleteCarrera($id){
      $materiaCarrera=MateriaCarrera::find($id);
      $materiaCarrera->delete();

      return redirect()->route('materias.show',[$materiaCarrera->materia_id]);
    }

    public function addCarrera(Request $request){
      $materia=Materia::find($request->materia_id);
      $materia->carreras()->attach($request->carrera_id,
            [ 'anio' => $request->anio,
              'estado' => 'activo'
          ]);

      return redirect()->route('materias.show',[$request->materia_id]);
    }

    
  
}