<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apunte;
use App\Carrera;
use App\Favorito;
use App\MateriaDocente;

class FavoritosController extends Controller
{
    public function listaFav(){
    	$user=Auth::user();
        $apuntes = Apunte::join("favoritos","apuntes.id","=","favoritos.apunte_id")
    	->where('favoritos.user_id','=',$user->id)
    	->where('favoritos.estado','=', 'activo')
    	->leftJoin('materias',function($join){
        $join->on('apuntes.materia_id','=','materias.id');})
        ->select('favoritos.carrera_id','apuntes.id','apuntes.nombre_apunte', 'apuntes.autores', 'apuntes.archivo', 'apuntes.tipo_archivo','materias.nombre_materia','materias.slug_materia')
    	->get();       
        
        return view('home.vistaFavoritos') ->with([
        	'lista' => $apuntes]);

    }

    public function guardaFav($nombre, $carrera, $materia,$apunte){
        $user=Auth::user();
        $carr = Carrera::where('slug_carrera', $carrera)->first();
        $apun = Apunte::where('nombre_apunte', $apunte)->first();
        $favo = Favorito::where('user_id','=', $user->id)
        ->where('apunte_id','=',$apun->id)
        ->where('carrera_id','=',$carr->id)
        ->where('estado','=','inactivo')
        ->get();
        if(!$favo->isEmpty()){
            $favoritos = Favorito::where('user_id','=', $user->id)
            ->where('apunte_id','=',$apun->id)
            ->where('carrera_id','=',$carr->id)
            ->update(array('estado' => 'activo'));
        }else{
            $favoritos = new Favorito();
            $favoritos->user_id = $user->id;
            $favoritos->apunte_id = $apun->id;
            $favoritos->carrera_id = $carr->id;
            $favoritos->estado = 'activo';
            $favoritos->save();
        }

        flash("El apunte ". $apun->nombre_apunte . " se guardo con exito." , 'success')->important();

        return redirect()->route('show.apunte', ['dpto' => $nombre,'carrera' => $carrera,'materia' => $materia,'apunte' => $apunte]);
    
     }

     public function unApunte($carrera,$materia,$apunte){
        $user=Auth::user();
        $carrera = Carrera::where('id', $carrera)->first();
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

    public function quitarApunte($carrera,$materia,$apunte){
        $user=Auth::user();
        $apu = Apunte::where('nombre_apunte', $apunte)->first();
        $favoritos = Favorito::where('user_id','=', $user->id)
        ->where('apunte_id','=',$apu->id)
        ->where('carrera_id','=',$carrera)
        ->update(array('estado' => 'inactivo'));

        flash("El apunte fue eliminado con Exito" , 'success')->important();

        return redirect()->route('favoritos');
    }
}
