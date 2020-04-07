@extends('layouts.main')
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="text-center">NUEVO DEPARTAMENTO</h3>
          </div>
          <div class="box box-info">
          <div class="box-body box-info">
            
            {!! Form::open(['route'=>'departamentos.store', 'method'=>'POST','files'=>true])!!}

             <div class="form-group">
              <h4>{!! Field::text('nombre_dpto',null, ['class'=>'form-control'])!!}</h4>
             </div>

              <h4>{!! Field::file('logo')!!}</h4>
            
              <div class= "form-group">
  
             <h4> {!! Form::label('estado','Estado')!!}
              {!! Form::select('estado', ['activo'=>'activo','inactivo'=>'inactivo'],null,['class'=>'form-control'])!!}</h4>
              </div>
              <div class="form-group text-center">
              {!! Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
              <a class="btn btn-danger" href="{{ route('departamentos.index') }}">Cancelar</a>
              </div>
          
 
              {!! Form::close() !!}

          </div>
        </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection