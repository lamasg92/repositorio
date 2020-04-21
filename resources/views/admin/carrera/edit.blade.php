@extends('layouts.main')
 
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Modificar Carrera</h3>
           
          </div>
          <div class="box-body">
            
            {!! Form::model($carrera,['route'=>['carreras.update',$carrera->id], 'method'=>'PATCH', 'files'=>true])!!}

              <div class="form-group">
              {!! Form::label('nombre_carrera','Nombre')!!}
              {!! Form::text('nombre_carrera',$carrera->nombre_carrera, ['class'=>'form-control'])!!}
              </div>

              <div class="form-group">
              {!! Form::label('duracion','Duración')!!}
              {!! Form::number('duracion',$carrera->duracion, ['class'=>'form-control'])!!}
              </div>

             <div class="form-group">
               {!! Form::label('anio_plan','Plan')!!}
               {!! Form::number('anio_plan',$carrera->duracion, ['class'=>'form-control'])!!}
             </div>
              
              <div> 
                 {!! Form::label('departamento_id','Departamento')!!}
                 {!! Form::select('departamento_id', $departamentos ,$carrera->departamento->id, ['class'=>'form-control'])!!} 

                
              </div>
             
              <div>
                   {!!form::label('Imagen Actual: ')!!} <img src="{{ asset('images/carrera/'.$carrera->imagen)  }}" width="40" height="40" > 
              </div>

              <div class="form-group">
              {!! Form::label('imagen','Nueva Imagen')!!}
              {!! Form::file('imagen')!!}
             </div>

              <div class="form-group">
              {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
              </div>
 
              {!! Form::close() !!}

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
   // placeholder_text_multiple: "Seleccione los eventos",

    
  });

</script>
@endsection