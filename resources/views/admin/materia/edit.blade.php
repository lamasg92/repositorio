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
            
           {!!Form::model($materia,['route'=>['materias.update',$materia->id], 'method'=>'PATCH', 'files'=>true])!!}

              <div class="form-group">
             {!! Form::label('nombre_materia','Nombre')!!}
              {!! Form::text('nombre_materia',$materia->nombre_materia, ['class'=>'form-control'])!!}
              </div>

              {{ Form::label('slug_materia', 'URL:') }}
            {{ Form::text('slug_materia', $materia->slug_materia, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}
                        
              <div>
              {!! Form::label('semestre','Cuatrimestre')!!}
                 
              {!! Form::select('semestre',['primer'=>'primer','segundo'=>'segundo','anual'=>'anual'],$materia->semestre,['class'=>'form-control'])!!}

              </div>

              <div>


              {!! Form::label('tipo','Tipo')!!}
                 
              {!! Form::select('tipo',['obligatoria'=>'obligatoria','optativa'=>'optativa'],$materia->tipo,['class'=>'form-control'])!!}

              </div>  

              <br>          

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
  $(document).ready(function(){
        $("#nombre_materia, #slug_materia").stringToSlug({
            callback: function(text){
                $('#slug_materia').val(text);
            }
        });
   });
</script>
@endsection
