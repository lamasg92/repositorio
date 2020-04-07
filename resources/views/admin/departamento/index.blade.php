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
            <th style="width:10px">Codigo</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>logo</th> 
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
            <td>{{$departamento->estado}}</td>
            <td> 
            @if($departamento->extension!=null)

            @endif
            </td>
            <td>
                      
        </tr>
  @endforeach
   </tbody>
 </table>
@else
<div class="alert alert-dismissable alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <p>No se encontró ninguna departamento.</p>
</div>

@endif

  </div>
</div>
@endsection
