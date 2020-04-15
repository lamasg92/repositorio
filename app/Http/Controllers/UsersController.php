<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    

    protected function index($tipo){

        if ($tipo=='admin') {
           
            $users= DB::table('role_user as ru')
                  ->join('users as u','ru.user_id','=','u.id')
                  ->select('*')
                  ->where('ru.role_id','=',1)
                  ->orderBy('dni','ASC')->paginate(10);
        } else {
          
            $users= DB::table('role_user as ru')
                  ->join('users as u','ru.user_id','=','u.id')
                  ->select('*')
                  ->where('ru.role_id','=',2)
                  ->where( 'u.type','=',$tipo)
                  ->orderBy('dni','ASC')->paginate(10);
        }

        return view('admin.user.index')->with('users',$users)
                                      ->with('type',$tipo);
    }


    protected function create($tipo)

    {
     
        return view('admin.user.create')->with('type',$tipo);
    }


   protected function store(UserRequest $request, $tipo){


        $usuario= new User($request->all());

        if ($tipo=='admin') {
          $usuario->type='docente';
          
        } else {
          $usuario->type=$tipo;
        }

         $usuario->password=bcrypt($request->dni);

          if($request->file('foto')){
            $file =$request->file('foto');
            $imagen=$file->getClientOriginalName();//nombre de img
            $path=public_path().'/images/users/';//donde guardamos img
            $file->move($path,$imagen);//guardar imagen
            $usuario->imagen=$imagen;
        }

        $usuario->save();

        if ($tipo=='admin') {
           $usuario->roles()->attach( ['role_id' => 1]);
        } else {
           $usuario->roles()->attach( ['role_id' => 2]);
                      
        }
        

       

        flash("El usuario ". $tipo . " ha sido creada con exito" , 'success')->important();
       

        return redirect()->route('admin' );
       
        

        

   }

   public function edit($id){
    $user=User::find($id);
     $roles=Role::orderBy('name','ASC')->pluck('name','id')->ToArray();
        return view('admin.users.edit')->with('user',$user)
                                       ->with('roles',$roles);  
     }
  
}