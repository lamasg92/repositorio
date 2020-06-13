@extends('layouts.main')
 
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Vista de Materia</h3>
            <div align="right">
            <input type ='button' class="btn btn-primary"  value = 'volver' onclick="location.href = '{{route('materias.index')}}'"/>
            </div>
          </div>         

          <div class="box-body">
  
            <div class="form-group">
             {!! Form::label('nombre_materia','Nombre')!!}
              {!! Form::text('nombre_materia',$materia->nombre_materia, ['class'=>'form-control','disabled'])!!}
            </div>

            <div class="form-group">
              {!! Form::label('semestre','Cuatrimestre')!!}
              {!! Form::select('semestre',['primer'=>'primer','segundo'=>'segundo','anual'=>'anual'],$materia->semestre,['class'=>'form-control','disabled'])!!}
            </div class="form-group">

            <div class="form-group">
              {!! Form::label('tipo','Tipo')!!}
              {!! Form::select('tipo',['obligatoria'=>'obligatoria','optativa'=>'optativa'],$materia->tipo,['class'=>'form-control','disabled'])!!}
            </div>
            <div>
            <input type ='button' class="btn btn-success"  value = 'Editar' onclick="location.href = '{{route('materias.edit',[$materia->id])}}'"/>
            <div>
<br>
{!! Form::label('Carrera','Carrera')!!}
<div class="box-body">              
  @if($materia->carreras->isNotEmpty())
 <table id="tabla table-striped" class="display table table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:10px">#</th>
            <th>Nombre</th>
            <th>Estado Carrera</th>
            <th>Año en el Plan</th>
            <th></th>
        </tr>
    </thead>
<tbody>
   @foreach($materia->carreras as $carrera) 
        <tr role="row" class="odd">
            <td>{{$carrera->id}}</td>
            <td>{{$carrera->nombre_carrera}}</td>
            <td>{{$carrera->estado}}</td>
            <td>{{$carrera->pivot->anio}}°</td>
            <td>
                <a href="{{route('materias.deleteCarrera',[$carrera->pivot->id])}}" onclick="return confirm('¿Seguro desea eliminar esta carrera?')">
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true" ></span>
                        </button>
                </a>
            </td>   
                      
      </tr>
  @endforeach
   </tbody>
 </table>

  @else
    <div class="alert alert-dismissable alert-warning">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <p>No se encontró ninguna carrera.</p>
    </div>
  @endif
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#carreraModal" data-backdrop="false">Agregar Carrera</button> 

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>


<!-- agregarCarreraModal -->
<div class="modal fade" id="carreraModal" tabindex="-1" role="dialog" aria-hidden="true"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar carrera</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
         <!-- Modal Body -->
        <div class="modal-body">
          <form name="formularioNuevaCarrera" method="POST" action="{{route('materias.addCarrera')}}">
                                  {{csrf_field()}}
              <div class="form-group">
                  <label for="actualPass">Carrera</label>
                    <select class="form-control" name="carrera_id" id="carrera_id" required="true"> 
                    <option value="">-- Elija Carrera --</option>
                    @foreach($carreras as $carrera)
                      <option value="{{$carrera->id}}">{{$carrera['nombre_carrera']}}</option>
                    @endforeach
                    </select>
               </div> 

            <div class="form-group">
              {!! Form::label('anio','Año en que cursa:')!!}
              {!! Form::number('anio',null, ['class'=>'form-control'])!!}
             </div>

             <input type="hidden" name="materia_id" value="{{$materia->id}}">
                
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <input type="submit"  class="btn btn-primary" value="Agregar">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
