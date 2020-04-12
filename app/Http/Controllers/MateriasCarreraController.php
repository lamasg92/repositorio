<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Carrera;
use App\MateriaCarrera;
use App\Http\Requests\MateriaRequest;
use Illuminate\Support\Facades\DB;

class MateriasCarreraController extends Controller
{
    
    public function index(Request $request)
    {
      

     }

      public function store(Request $request)
    {
    	
          
                $detalle = new ProviderProduct();
                $detalle->materia_id=$request->_id; 
                $detalle->carrera_id=$request->carrera_id;
                $detalle->save();
             
            
       
        return redirect()->route('matreria.create');

    }

}
