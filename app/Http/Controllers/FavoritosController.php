<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorito;
use App\Apunte;

class FavoritosController extends Controller
{
    public function listaFav(){
    	$user=Auth::user();
        //$lista = Favorito::where('user_id', '=', $user->id)->get();;
        
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
}
