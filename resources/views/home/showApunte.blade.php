@extends('layouts.home')

@section('navegacion')
  {{ Breadcrumbs::render('show.apunte', $dpto ,$carrera,$materia,$apunte) }}
@endsection

@section('content')
	
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
    </section>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        
        <embed src="{{asset('apuntes/'.$apunte->archivo)}}" type="application/pdf" width="100%" height="1200px" />
        
      </div>
    </section> 	
@endsection