<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UsuarioCarrera;
use Illuminate\Support\Facades\DB;
use App\Carrera;
use Hash;

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
            $foto->move('images/user', $nombre_foto);
       
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
        $request->session()->flash('alert-success', 'Sus datos se actualizaron correctamente');
        return redirect()->route('perfil');
    }

    public function datosUsuario()
    {
    	$user=Auth::user();
        $datosusuario = UsuarioCarrera::where('user_id', '=', $user->id)
        ->join('carreras','carreras.id','=','usuario_carrera.carrera_id')->get();;
        $carreras=Carrera::paginate(10);
        return view('home.perfil') ->with([
        	'datosusuario' => $datosusuario, 
        	'carreras' => $carreras]);
    }

    public function cambiaremail(request $request)
    {
    	$user=Auth::user();
    	dB::table('users')->where('id', $user->id)->update( array('email'=>$request->input('nuevoemail')));      	        
        return redirect()->route('perfil');
    }

     public function cambiarpass(request $request)
    {
    	if($request->input('nuevaPass1') == $request->input('nuevaPass2'))
    	{

    		$user=Auth::user();
    		$pass_user = $request->input('actualPass');
    		if(Hash::check($pass_user,$user->password))
    		{    			
    			DB::table('users')->where('id', $user->id)->update(array('password'=>bcrypt($request->input('nuevaPass1'))));
    			$request->session()->flash('alert-success', 'Se cambió su contraseña');

    		}
    		else
    		{
    			$request->session()->flash('alert-success', 'No se encontró su contraseña de acceso');
    		}    		
    	}
    	else
    	{
    		$request->session()->flash('alert-success', 'Las nuevas contraseñas no coinciden');
    	}    
        return redirect()->route('perfil');
    }
}
