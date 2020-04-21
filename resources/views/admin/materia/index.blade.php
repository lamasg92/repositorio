@extends('layouts.main')

@section('content')

<div class="box box-primary">
  <div class="box-header ">
    <h2 class="box-title col-md-5">Listado de Materias</h2>
    <br><br>
    <input type ='button' class="btn btn-success"  value = 'Agregar' onclick="location.href = '{{route('materias.create')}}'"/> 
  </div>

<div class="box-body">              
  @if($materias->isNotEmpty())
 <table id="tabla table-striped" class="display table table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:10px">#</th>
            <th>Nombre</th>
            <th>Cuatrimestre</th>
            <th>Tipo</th> 
            <th>Carrera</th>
            <th>Año Carrera</th>
            <th>Estado</th> 
            <th></th>
        </tr>
    </thead>
<tbody>
   @foreach($materias as $materia) 

          @if ($materia->estado!='inactivo')
            <tr role="row" class="odd">
          @else
            <tr role="row" class="odd" style="background-color: rgb(255,96,96);">
          @endif
            <td>{{$materia->id}}</td>
            <td>{{$materia->nombre_materia}}</td>
            <td>{{$materia->semestre}}</td>
            <td>{{$materia->tipo}}</td>
            <td>{{$materia->nombre_carrera}}</td>
            <td>{{$materia->anio}}</td>
            <td>{{$materia->estado}}</td>
             <td>
                @if ($materia->estado!='inactivo')
             
                <a href="{{route('materias.edit',[$materia->materia_id,$materia->carrera_id])}}"  >
                        <button type="submit" class="btn btn-warning">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
                        </button>
                     </a>

                <a href="{{route('materias.desable',[$materia->materia_id,$materia->carrera_id])}}" onclick="return confirm('¿Seguro dara de baja esta materia?')">
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true" ></span>
                        </button>
                </a>
            @else
                <a href="{{route('materias.enable',[$materia->id,$materia->carrera_id])}}" onclick="return confirm('¿Seguro desea dar de alta esta materia?')">
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true" ></span>
                        </button>
                </a>
            @endif
            </td>   
                      
        </tr>  </tr>
  @endforeach
   </tbody>
 </table>

 <div class="text-center">

  {!!$materias->render()!!}

</div>

 @else
<div class="alert alert-dismissable alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <p>No se encontró ninguna materia.</p>
</div>

@endif

  </div>
</div>
@endsection
