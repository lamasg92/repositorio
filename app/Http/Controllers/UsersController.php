<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Hash;


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

    //create user


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
            $path=public_path().'/images/user/';//donde guardamos img
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
       

        return redirect()->route('users.index',$tipo );
    

   }

        
//upadte de data user

   public function edit($id,$tipo){

         $user=User::find($id);
        
        return view('admin.user.edit')->with('user',$user)
                                      ->with('type',$tipo);
                                       
   }

 
    public function update(Request $request, $id, $tipo)
    {
        $user=User::find($id);

        $user->fill($request->all());
     
        if($request->file('foto')){
            $file =$request->file('foto');
            $foto=$file->getClientOriginalName();
            if ($foto!=$user->foto){
                $path=public_path().'/images/user/';
                $file->move($path,$foto);
                $user->foto=$foto;
            }
        }

        $user->save();
        flash("El usuario  ". $user->surname." ". $user->name . " ha sido modificada con exito" , 'success')->important();


     
        return redirect()->route('users.index',$tipo);
    }

    //upadate status

 public function desable($id)
    {
        $usuario= User::find($id);
        $usuario->status='inactivo';
        $usuario->save();
        return redirect()->route('users.index', $usuario->type);
    }

     public function enable($id)
    {
        $usuario= User::find($id);
        $usuario->status='activo';
        $usuario->save();
        return redirect()->route('users.index',$usuario->type);
    }
 
//update profile admin

   public function profile(){
 
    return view('admin.user.profile');

   }

    public function updatePassword(){
    return view('admin.user.updatePassword');
   }


   public function updateMyPassword(Request $request){
 

    if($request->input('nuevaPass1') == $request->input('nuevaPass2'))
          {

            $user=\Auth::user();
            $pass_user = $request->input('actualPass');
            if(Hash::check($pass_user,$user->password))
            {         
              DB::table('users')->where('id', $user->id)->update(array('password'=>bcrypt($request->input('nuevaPass1'))));
            
               flash("Su contraseña ha sido cambiada con exito", 'success')->important();

                 return redirect()->route('users.profile');

            }
            else
            {
              
              flash("No se encontro su contraseña de acceso ", 'success')->error()->important();
                   return redirect()->route('users.updatePassword');
            }       
          }
          else
          {
           flash("Las nuevas contraseñas no coinciden ", 'success')->error()->important();
                   return redirect()->route('users.updatePassword');
            
          }    
          



   }
   
  
   public function editProfile(){


    return view('admin.user.updateProfile');
   }

   public function editMyProfile(EditUserRequest $request){

   $user=\Auth::user();
  
    $user->fill($request->all());
   
      if($request->file('foto')){
                 $file =$request->file('foto');
                 $foto=$file->getClientOriginalName();
                 if ($foto!=$user->foto){
                       $path=public_path().'/images/user/';
                       $file->move($path,$foto);
                      $user->foto=$foto;
                    }
          }

    $user->save();
    flash("Sus datos se cambiaron correctamente ", 'success')->important();
     
       return redirect()->route('users.profile');
   
   }

}