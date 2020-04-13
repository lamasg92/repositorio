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
              <h4>
                {!! Field::text('nombre_dpto',null, ['class'=>'form-control'])!!}</h4>
             </div>

             {{ Form::label('slug_dpto', 'URL:') }}
             {{ Form::text('slug_dpto', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

              <div class="form-group">

              <h4>
                {!! Field::text('sitio_web',null, ['class'=>'form-control'])!!}</h4>
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

@section('js')
<script src="{{asset('stylesAdmin/js/plantilla.js')}}"></script>
<script>
$(document).ready(function(){
      $("#nombre_dpto, #slug_dpto").stringToSlug({
          callback: function(text){
              $('#slug_dpto').val(text);
          }
      });
 });
</script>
@endsection

