@extends('layouts.main')


@section('content')

<div class="container-fluid spark-screen">
 
 <div class="row">

 <div class="col-md-8 col-md-offset-2">
  
  <div class="box box-info">

      <div class="box-header with-border" align="center" >
        
        <h4 class="box-title">Mi Perfil</h4>
           
      </div>

      <div class="box-body">

      <div align="center">
        @if(Auth::user()->foto!=null)
        <img src="{{asset('images/user/'.Auth::user()->foto)}}" class="img-circle" alt="User avatar" width="80" height="80" >
            
         @endif
     
      </div>
      <br>
        <h4>Apellido: {{ Auth::user()->surname }}</h4>
        <h4>Nombre: {{ Auth::user()->name }}</h4>
        <h4>DNI: {{ Auth::user()->dni }}</h4>
        <h4>Email: {{ Auth::user()->email }}</h4>

     </div>

  </div>


  <div class="box-footer">
          <div class="form-group" align="center">
            <div class="col-sm-6 border-right">
               <input type ='button' class="btn btn-primary"  value = 'Modificar Contraseña' onclick="location.href = '{{route('users.updatePassword') }}'"/>  
            </div>
            <div class="col-sm-6 border-right">
                <input type ='button' class="btn btn-primary"  value = 'Modificar Perfil' onclick="location.href = '{{route('users.editProfile') }}'"/>  
            
            </div>
          </div>

  </div>

</div>

  </div>
</div>

@endsection