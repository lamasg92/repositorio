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

            <div class= "form-group">
              <h4> {!! Form::label('semestre','Cuatrimestre')!!}
              {!! Form::select('semestre', ['primer'=>'primer','segundo'=>'segundo','anual'=>'anual'],null,['class'=>'form-control'])!!}</h4>
            </div>

            <div class= "form-group">
              <h4> {!! Form::label('tipo','Tipo')!!}
              {!! Form::select('tipo', ['obligatoria'=>'obligatoria','optativa'=>'optativa'],null,['class'=>'form-control'])!!}</h4>
            </div>

                          
              <div class= "form-group titulo_h4">
              {!! Field::select('departamento_id', $departamentos, ['class'=>'dpto' ,'select-carrera','empty'=>'Seleccione un departamento'])!!}


              {!! Field::select('carrera_id', $carreras, ['class'=>'select-carrera','empty'=>'Seleccione una carrera'])!!} 
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
    $('.select-departamento').chosen();
    $('.select-carrera').chosen();
 </script>

 <script src="{{asset('stylesAdmin/js/plantilla.js')}}">
  
</script>

 <script src="{{asset('stylesAdmin/js/dropdown.js')}}">
  
</script>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

 

@endsection