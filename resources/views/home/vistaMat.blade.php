@extends('layouts.home')

@section('navegacion')
  {{ Breadcrumbs::render('dpto.materias', $dpto ,$carrera) }}
@endsection

@section('content')
	
	<section class="hero-wrap hero-wrap-1" data-stellar-background-ratio="0.6" style="background-image: url('{{asset("/images/image_0.jpg")}}');">
      
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">

					   <h3 class="mb-2 bread"><a href="{{ url('dpto/$dpto->slug_dpto')}}">
             <?php echo $dpto->nombre_dpto.'</a> <br/>'.$carrera->nombre_carrera; ?>
             <br>Repositorio</h3>
          </div>
        </div>
      </div>
    </section>
	
	<section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        
        	@foreach($materias as $mat)
        	<div class="row d-flex">
        		<div class="col-md-9 ftco-animate">
        		<a href="{{ url('dpto/'.$dpto->slug_dpto.'/'.$carrera->slug_carrera.'/'.$mat->slug_materia )}}" style="color: green" >{{ $mat->anio }} Año / {{ $mat->nombre_materia }} -- {{ $mat->semestre }} Cuatrimestre -- Tipo: {{ $mat->tipo }}</a> 
        		</div>
        	</div>
        	@endforeach
        
      </div>
    </section> 	
@endsection