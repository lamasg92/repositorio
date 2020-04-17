@extends('layouts.home')

@section('navegacion')
  {{ Breadcrumbs::render('show.apunte', $dpto ,$carrera,$materia,$apunte) }}
@endsection

@section('content')
	
	<section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('{{asset("/images/carrera/".$carrera->imagen)}}');">
      
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate text-center">
					<h3 class="mb-4 bread"><a href="{{ url('dpto/'.$dpto->slug_dpto)}}">
						<?php echo $dpto->nombre_dpto; ?></a> <br/>
						<a href="{{ url('dpto/'.$dpto->slug_dpto.'/'.$carrera->slug_carrera) }}">
							<?php echo $carrera->nombre_carrera; ?></a><br><?php echo $materia->nombre_materia; ?><br>Apuntes</h3>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">

        <div class="embed-responsive embed-responsive-1by1">
            <embed class="embed-responsive-item" src="{{asset('apuntes/'.$apunte->archivo)}}" type="{{$apunte->tipo}}"/>
        </div>
        
        
        
      </div>
    </section> 	
@endsection