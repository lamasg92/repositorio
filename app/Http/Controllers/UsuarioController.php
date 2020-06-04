<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Carrera;
use App\MateriaDocente;
use App\UsuarioCarrera;
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
        $request->session()->flash('alert-success', 'Sus datos se actualizaron correctamente');
        return redirect()->route('perfil');
    }

    public function datosUsuario()
    {
    	$user=Auth::user();

        if ($user->type=='alumno'){
            $datosusuario = $user->carreras;
        }else{
            $datosusuario = $user->materias;
        }
        $carreras=Carrera::all();

        return view('home.perfil') ->with([
            'datosusuario' => $datosusuario, 
            'carreras' => $carreras]);
    }

    public function agregarCarrera(request $request)
    {
        $user=Auth::user();
        $usuariocarrera = new UsuarioCarrera($request->all());
        $usuariocarrera->user_id = $user->id;
        $usuariocarrera->save();

        $request->session()->flash('alert-success', 'Carrera agregada con exito');
        return redirect()->route('perfil');
    }

    public function eliminarCarrera($id)
    {
        $usuariocarrera = UsuarioCarrera::find($id);
        $usuariocarrera->delete();
        flash('alert-danger', 'Carrera ha sido eliminada.')->important();;
        return redirect()->route('perfil');
    }

    public function agregarMateria(request $request)
    {
        $user=Auth::user();
        $materiadocente= new MateriaDocente();
        $materiadocente->user_id=$user->id;
        $materiadocente->materia_id=$request->materia_id;
        $materiadocente->save();

        $request->session()->flash('alert-success', 'Materia agregada con exito');
        return redirect()->route('perfil');
    }

    public function bajaMateria($id)
    {
        $materiadocente=MateriaDocente::find($id);
        $materiadocente->estado='inactivo';
        $materiadocente->save();
        
        flash('alert-danger', 'La materia ha sido dado de baja.')->important();;
        return redirect()->route('perfil');
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

    public function getCarreraMateria(Request $request, $id)
    {
        if($request->ajax()){
            $materias=Carrera::find($id)->materias;
            return response()->json($materias);
        }
    }
}
