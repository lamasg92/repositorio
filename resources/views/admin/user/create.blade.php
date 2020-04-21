@extends('layouts.main')
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">

            @if ($type == 'docente')
                <h3 class="text-center">NUEVO DOCENTE</h3>
     
            @else

              @if ($type=='alumno')

                <h3 class="text-center">NUEVO ALUMNO</h3>
              @else
                 <h3 class="text-center">NUEVO ADMINISTRADOR</h3>
              @endif
      
            @endif
          
          </div>
          <div class="box box-info">
          <div class="box-body box-info">
            
            {!! Form::open(['route'=>array('users.store', $type), 'method'=>'POST','files'=>true])!!}

             <div class="form-group">
              <h4>{!! Form::label('dni','DNI')!!}</h4>
              <h4>{!! Form::number('dni',null, ['class'=>'form-control'])!!}</h4>
             </div>

             <div class="form-group">
              <h4>{!! Form::label('surname','Apellido')!!}<h4>
              <h4>{!! Form::text('surname',null,['class'=>'form-control'])!!}</h4>
             </div>

             <div class="form-group">
             <h4>{!! Form::label('name','Nombre')!!}<h4>
              <h4>{!! Form::text('name',null, ['class'=>'form-control'])!!}</h4>
             </div>

             <div class="form-group">
              <h4>{!! Field::email('email',null, ['class'=>'form-control'])!!}</h4>
             </div>

            
             <div><h4>{!! Field::file('imagen',['class'=>'foto'] )!!}</h4>
            
              <img src="" class="img-thumbnail previsualizarFoto" width="100%">

              </div>

              <div class="form-group text-center">
              {!! Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
              <a class="btn btn-danger" href="{{route('users.create', $type )}}">Cancelar</a>
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
@endsection