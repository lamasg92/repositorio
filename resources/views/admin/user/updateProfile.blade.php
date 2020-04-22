@extends('layouts.main')
 
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Modificar Mis Datos</h3>
           
          </div>
          <div class="box-body">
             
            {!! Form::open(['route'=>'users.editMyProfile', 'method'=>'PATCH', 'files'=>true])!!}


             {!! Form::label('Foto Actual')!!}
              <br>
              <div class="form-group">             
               <img src="{{ asset('images/user/'.Auth::user()->foto)  }}"  width="160" height="150" >
              </div>
              <div class="form-group">

              
              {!! Field::file('foto')!!}

              </div>

             <div class="form-group">
           
              {!! Field::text('dni',Auth::user()->dni,['disabled'])!!}

              </div>

              <div class="form-group">
           
              {!! Field::text('surname',Auth::user()->surname)!!}

              </div>

              <div class="form-group">
              {!! Field::text('name',Auth::user()->name)!!}
              </div>

              <div class="form-group">
               {!! Field::email('email',Auth::user()->email)!!}
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
         
          
