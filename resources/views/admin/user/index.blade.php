@extends('layouts.main')

@section('content')

<div class="box box-primary">

<div class="box-header ">



 @if ($type == 'docente')

      <h2 class="box-title col-md-5">Listado de Docentes</h2>
     
       <!-- search name form -->
@else 

    @if ($type == 'alumno')

      <h2 class="box-title col-md-5">Listado de Alumnos</h2>

    @else   

      <h2 class="box-title col-md-5">Listado de Administradores</h2>  
      
    @endif    
      
@endif

       <br><br> 

      <input type ='button' class="btn btn-success"  value = 'Agregar' onclick="location.href = '{{url('admin/usercreate', $type) }}'"/>     
             
 
</div>
<div class="box-body">              
  @if($users->isNotEmpty())
 <table id="tabla table-striped" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
                <th>DNI</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Foto</th>
                <th></th>
            </tr>
        </thead>
     
       
<tbody>
   @foreach($users as $user) 

            <tr role="row" class="odd">
            <td>{{$user->dni}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->status}}</td>
            <td>   
             @if($user->foto!=null)
                <div>
                  
                  <a data-toggle="modal">
                   <img src="{{ asset('images/users/'.$user->foto)  }}" width="40" height="40"> 
                  </a>
                  
                </div>
            @endif</td>
            
           
            <td>
              <a href=""  >
                        <button type="submit" class="btn btn-warning">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
                        </button>
                     </a>
              <a href="" onclick="return confirm('¿Seguro dara de baja usuario?')">
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true" ></span>
                        </button>
                     </a>
            </td>         
          
        </tr>
  @endforeach
   </tbody>
 </table>
 <div class="text-center">
   {!!$users->render()!!}
 </div>

@else
<div class="alert alert-dismissable alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <p>No se encontró ningun usuario .</p>
</div>

@endif

</div>

</div>


@endsection

