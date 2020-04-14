@extends('layouts.home')

@section('content')
	
	<section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('../images/image_2.jpg');">
      
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          		@if(strpos($nombDpto, 'Informática') !== false)
					<h3 class="mb-2 bread"><a href="{{ url('vistaCar/1')}}"><?php echo $nombDpto.'</a> <br/>'.$nombCarr; ?><br>Repositorio</h3>
				@endif
            	@if(strpos($nombDpto, 'Matemática') !== false)
					<h3 class="mb-2 bread"><a href="{{ url('vistaCar/2')}}"><?php echo $nombDpto.'</a> <br/>'.$nombCarr; ?><br>Repositorio</h3>
				@endif
				@if(strpos($nombDpto, 'Química') !== false)
					<h3 class="mb-2 bread"><a href="{{ url('vistaCar/3')}}"><?php echo $nombDpto.'</a> <br/>'.$nombCarr; ?><br>Repositorio</h3>
				@endif
				@if(strpos($nombDpto, 'Física') !== false)
					<h3 class="mb-2 bread"><a href="{{ url('vistaCar/4')}}"><?php echo $nombDpto.'</a> <br/>'.$nombCarr; ?><br>Repositorio</h3>
				@endif
          </div>
        </div>
      </div>
    </section>
	
	<section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        
        	@foreach($materias as $mat)
        	<div class="row d-flex">
        		<div class="col-md-9 ftco-animate">
        		<a href="{{ url('vistaApuntes/'.$mat->id.'/'.$nombDpto.'/'.$nombCarr.'/'.$idCarr)}}" style="color: green" >{{ $mat->anio }} Año / {{ $mat->nombre_materia }} -- {{ $mat->semestre }} Cuatrimestre -- Tipo: {{ $mat->tipo }}</a> 
        		</div>
        	</div>
        	@endforeach
        
      </div>
    </section> 	
@endsection