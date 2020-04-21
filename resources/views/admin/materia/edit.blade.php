@extends('layouts.main')
 
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Modificar Materia</h3>
           
          </div>
          <div class="box-body">
            
           {!!Form::model($materia,['route'=>['materias.update',$materia->materia_id,$materia->id], 'method'=>'PATCH', 'files'=>true])!!}

              <div class="form-group">
             {!! Form::label('nombre_materia','Nombre')!!}
              {!! Form::text('nombre_materia',$materia->nombre_materia, ['class'=>'form-control'])!!}
              </div>

                        
              <div>
              {!! Form::label('semestre','Cuatrimestre')!!}
                 
              {!! Form::select('semestre',['primero'=>'primero','segundo'=>'segundo','anual'=>'anual'],$materia->semestre,['class'=>'form-control'])!!}

              </div>

              <div>


              {!! Form::label('tipo','Tipo')!!}
                 
              {!! Form::select('tipo',['obligatoria'=>'obligatoria','optativa'=>'optativa'],$materia->tipo,['class'=>'form-control'])!!}

              </div>

             <div class="form-group">
               {!! Form::label('anio','Año')!!}
               {!! Form::number('anio',$materia->anio, ['class'=>'form-control'])!!}
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
