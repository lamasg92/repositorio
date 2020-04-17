@extends('layouts.main')
 
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Modificar Usuario</h3>
           
          </div>
          <div class="box-body">
            {!! Form::model($user,['route'=>['users.update',$user->id,$type], 'method'=>'PATCH', 'files'=>true])!!}

              <div class="form-group">
              {!! Form::label('surname','Apellido')!!}
              {!! Form::text('surname',$user->surname, ['class'=>'form-control'])!!}
              </div>

              <div class="form-group">
              {!! Form::label('name','Nombre')!!}
              {!! Form::text('name',$user->name, ['class'=>'form-control'])!!}
              </div>

              <div> 

                @if ($type!='admin')

                 {!! Form::label('type','Tipo')!!}
                 
                 {!! Form::select('type',['alumno'=>'alumno','docente'=>'docente'],$user->type,['class'=>'form-control'])!!}
                @endif
               
              </div>
                  
              <div class="form-group">
              {!! Form::label('email','Email')!!}
              {!! Form::text('email',$user->email, ['class'=>'form-control'])!!}
              </div>

              <div>
                   {!!form::label('Imagen Actual: ')!!} <img src="{{ asset('images/user/'.$user->foto)  }}" width="40" height="40" > 
              </div>

              <div class="form-group">
              {!! Form::label('foto','Nueva Imagen')!!}
              {!! Form::file('foto')!!}
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
