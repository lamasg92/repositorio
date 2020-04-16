@extends('layouts.main')
 
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Modificar Departamento</h3>
           
          </div>
          <div class="box-body">
            
            {!! Form::model($departamento,['route'=>['departamentos.update',$departamento->id], 'method'=>'PATCH', 'files'=>true])!!}

              <div class="form-group">
              {!! Form::label('nombre_dpto','Nombre')!!}
              {!! Form::text('nombre_dpto',$departamento->nombre_dpto, ['class'=>'form-control'])!!}
              </div>

              <div>
                   {!!form::label('Imagen Actual: ')!!} <img src="{{ asset('images/departamento/'.$departamento->logo)  }}" width="40" height="40" > 
              </div>
              <div class="form-group">
              {!! Form::label('logo','Nueva Imagen')!!}
              {!! Form::file('logo')!!}
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