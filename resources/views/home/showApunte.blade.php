@extends('layouts.home')

@section('navegacion')
  {{ Breadcrumbs::render('show.apunte', $dpto ,$carrera,$materia,$apunte) }}
@endsection

@section('content')
<script type="text/javascript">
  function ConfirmGuardar(){
    var respuesta = confirm("¿Confirma que desea agregar este apunte a su carpeta Favoritos?");
    if (respuesta == true){
      return true;
    }else{ return false;}
  }
</script>
	
	<section class="hero-wrap hero-wrap-1" data-stellar-background-ratio="0.6" style="background-image: url('{{asset("/images/image_2.jpg")}}');">
      
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
					<h3 class="mb-2 bread"><a href="{{ url('dpto/'.$dpto->slug_dpto)}}">
						<?php echo $dpto->nombre_dpto; ?></a> <br/>
						<a href="{{ url('dpto/'.$dpto->slug_dpto.'/'.$carrera->slug_carrera) }}">
							<?php echo $carrera->nombre_carrera; ?></a><br><?php echo $materia->nombre_materia; ?><br>Apuntes</h3>

          </div>
        </div>
      </div>
    </section><br>
    @include('flash::message')
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
            @if(!$favorito->isEmpty())
              <u><a style="color: blue; size: 20px;"> Agregado a Favoritos</a></u>
            @else
                <a href="{{ url('favoritos/'.$dpto->slug_dpto.'/'.$carrera->slug_carrera.'/'.$materia->slug_materia.'/'.$apunte->nombre_apunte )}}" class="btn btn-primary" onclick="return ConfirmGuardar()">Agregar a Favoritos</a>
            @endif
               
          </div>
        </div>      
      </div>
    </section> <br>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <h3><?php echo 'Título: '.$apunte->nombre_apunte; ?></h3>
        <h4><?php echo 'Autor/es: '.$apunte->autores; ?></h4>
        <embed src="{{asset('apuntes/'.$apunte->archivo)}}" type="application/pdf" width="100%" height="1200px" />
        
      </div>
    </section> 	
@endsection