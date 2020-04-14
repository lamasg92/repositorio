@extends('layouts.main')

@section('content')

<div class="box box-primary">
  <div class="box-header ">
    <h2 class="box-title col-md-5">Listado de Departamentos</h2>
    <br><br>
    <input type ='button' class="btn btn-success"  value = 'Agregar' onclick="location.href = '{{route('departamentos.create')}}'"/> 
  </div>

<div class="box-body">              
  @if($departamentos->isNotEmpty())
 <table id="tabla table-striped" class="display table table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:10px">#</th>
            <th>Nombre</th>
            <th>Sitio Web</th>
            <th>Estado</th>
            <th>Imagen</th> 
            <th></th>
        </tr>
    </thead>
<tbody>
   @foreach($departamentos as $departamento) 

          @if ($departamento->estado!='inactivo')
            <tr role="row" class="odd">
          @else
            <tr role="row" class="odd" style="background-color: rgb(255,96,96);">
          @endif
            <td>{{$departamento->id}}</td>
            <td>{{$departamento->nombre_dpto}}</td>
            <td>{{$departamento->sitio_web}}</td>
            <td>{{$departamento->estado}}</td>
            <td> 
            @if($departamento->logo!=null)
                 <div>
                  
                  <a data-toggle="modal">
                   <img src="{{ asset('images/departamento/'.$departamento->logo)  }}" width="40" height="40"> 
                   </a>
                  
                   </div>
            @endif
            </td>
             <td>
              <a href=""  >
                        <button type="submit" class="btn btn-warning">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
                        </button>
                     </a>
              <a href="" onclick="return confirm('¿Seguro dara de baja el departamento?')">
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true" ></span>
                        </button>
                     </a>
            </td>   
           
                      
        </tr>
        </tr>
  @endforeach
   </tbody>
 </table>
<div class="text-center">

  {!!$departamentos->links()!!}

</div>

@else
<div class="alert alert-dismissable alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <p>No se encontró ninguna departamento.</p>
</div>

@endif

  </div>
</div>
@endsection
