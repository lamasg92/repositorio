@extends('layouts.main')
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="text-center">NUEVA CARRERA</h3>
          </div>
          <div class="box box-info">
          <div class="box-body box-info">
            
            {!! Form::open(['route'=>'carreras.store', 'method'=>'POST','files'=>true])!!}

             <div class="form-group">
              <h4>{!! Field::text('nombre_carrera',null, ['class'=>'form-control'])!!}</h4>
             </div>

             <div class="form-group">
              <h4>{!! Field::number('duracion',null, ['class'=>'form-control'])!!}</h4>
             </div>

             <div class="form-group">
              <h4>{!! Field::number('anio_plan',null, ['class'=>'form-control'])!!}</h4>
             </div>

               
              <div class= "form-group titulo_h4">
              {!! Field::select('departamento_id', $departamentos, ['class'=>'select-departamento','empty'=>'Seleccione un departamento'])!!} 

              </div>

             <div><h4>{!! Field::file('imagen',['class'=>'foto'] )!!}</h4>
            
              <img src="" class="img-thumbnail previsualizarFoto" width="100%">

              </div>

              <div class= "form-group">
  
             <h4> {!! Form::label('estado','Estado')!!}
              {!! Form::select('estado', ['activo'=>'activo','inactivo'=>'inactivo'],null,['class'=>'form-control'])!!}</h4>
              </div>
              <div class="form-group text-center">
              {!! Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
              <a class="btn btn-danger" href="{{ route('carreras.index') }}">Cancelar</a>
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

@section('js')
<script>
  $('.select-tag').chosen({
    placeholder_text_multiple: "Seleccione los eventos",
  });
  $('.select-departamento').chosen();
 </script>

 <script src="{{asset('stylesAdmin/js/plantilla.js')}}">
  
</script>
 

@endsection