<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UsuarioCarrera;
use Illuminate\Support\Facades\DB;
use App\Carrera;

class UsuarioController extends Controller
{
    public function store(request $request)
    {
        $user=Auth::user();
        if($request->file('imagen'))
        {
        	$foto = $request->file('imagen');
            $nombre_foto = $foto->getClientOriginalName();
        	DB::table('users')->where('id', $user->id)->update( array('foto'=>$nombre_foto));      	
            $foto->move('imagenes/users', $nombre_foto);
       
        } 
    

        $existe = UsuarioCarrera::where('user_id', '=', $user->id)->get();
        if(count($existe)==0)
        {
        	$usuariocarrera = new UsuarioCarrera($request->all());
	        $usuariocarrera->user_id = $user->id;
	        $usuariocarrera->estado = 'activo';
	        $usuariocarrera->carrera_id = $request->input('carrera');
	        $usuariocarrera->anio_ingreso = $request->input('ingreso');
	        $usuariocarrera->libreta = $request->input('lu');
	        $usuariocarrera->save();
        }
        else
        {
        	DB::table('usuario_carrera')->where('user_id', $user->id)->update( array('carrera_id'=>$request->input('carrera'),'anio_ingreso'=>$request->input('ingreso'),'libreta'=>$request->input('lu')));
        }
        
        //flash("Sus datos se actualizaron correctamente" , 'success')->important();
        return redirect()->route('perfil');
    }

    public function datosUsuario()
    {
    	$user=Auth::user();
        $datosusuario = UsuarioCarrera::where('user_id', '=', $user->id)->get();;
        $carreras=Carrera::paginate(10);
        return view('home.perfil') ->with([
        	'datosusuario' => $datosusuario, 
        	'carreras' => $carreras]);
    }
}
