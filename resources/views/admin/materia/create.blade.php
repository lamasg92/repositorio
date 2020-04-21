@extends('layouts.main')
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="text-center">NUEVA MATERIA</h3>
          </div>
          <div class="box box-info">
          <div class="box-body box-info">
            
          {!! Form::open(['route'=>'materias.store', 'method'=>'POST','files'=>true])!!}

            <div class="form-group">
              <h4>{!! Field::text('nombre_materia',null, ['class'=>'form-control'])!!}</h4>
            </div>

            {{ Form::label('slug_materia', 'URL:') }}
            {{ Form::text('slug_materia', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

            <div class= "form-group">
              <h4> {!! Form::label('semestre','Cuatrimestre')!!}
              {!! Form::select('semestre', ['primer'=>'primer','segundo'=>'segundo','anual'=>'anual'],null,['class'=>'form-control'])!!}</h4>
            </div>

            <div class= "form-group">
              <h4> {!! Form::label('tipo','Tipo')!!}
              {!! Form::select('tipo', ['obligatoria'=>'obligatoria','optativa'=>'optativa'],null,['class'=>'form-control'])!!}</h4>
            </div>

                          
              <div class="form-group">
              {!! Form::label('carreras','Carreras')!!}
              {!! Form::select('carreras[]', $carreras, null, ['class'=>'form-control select-carrera','multiple'])!!} 
              </div>

              <div class="form-group">
              <h4>{!! Field::number('anio',null, ['class'=>'form-control'])!!}</h4>
             </div>


              <div class= "form-group">
  
             <h4> {!! Form::label('estado','Estado')!!}
              {!! Form::select('estado', ['activo'=>'activo','inactivo'=>'inactivo'],null,['class'=>'form-control'])!!}</h4>
              </div>
              <div class="form-group text-center">
              {!! Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
              <a class="btn btn-danger" href="{{ route('materias.index') }}">Cancelar</a>
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

    $('.select-carrera').chosen({
      placeholder_text_multiple: "Seleccione las Carreras",
    });
 </script>

<script>
  $(document).ready(function(){
        $("#nombre_materia, #slug_materia").stringToSlug({
            callback: function(text){
                $('#slug_materia').val(text);
            }
        });
   });
</script>

 <script src="{{asset('stylesAdmin/js/plantilla.js')}}"></script>

 

@endsection