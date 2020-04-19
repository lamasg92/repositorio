@extends('layouts.home')

@section('navegacion')
  {{ Breadcrumbs::render('dpto.apuntes', $dpto ,$carrera,$materia) }}
@endsection

@section('content')
	
	<section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('{{asset("/images/image_2.jpg")}}');">
      
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
					<h3 class="mb-2 bread font-responsive-3"><a href="{{ url('dpto/'.$dpto->slug_dpto)}}">
						<?php echo $dpto->nombre_dpto; ?></a> <br/>
						<a href="{{ url('dpto/'.$dpto->slug_dpto.'/'.$carrera->slug_carrera) }}">
							<?php echo $carrera->nombre_carrera; ?></a><br><?php echo $materia->nombre_materia; ?><br>Apuntes</h3>

          </div>
        </div>
      </div>
    </section>
    <br>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container justify-content-center">
        @foreach($apuntes as $apunte)
        <div class="row slider-text align-items-center border border-dark rounded">
          <div class="col-md-2 text-center">
          <img src="{{asset('images/iconoApunte.png')}}" style="width: 50px; height: 50px;" alt="Responsive image"></div>
            <div class="col-md-8"><a style="color: #176e4c; font-size: 20px;">Titulo: {{ $apunte->nombre_apunte }}</a> - Autor: {{ $apunte->autores }} - Materia: {{ $apunte->nombre_materia }}</div>
            <div class="col-md-2 text-center"><a href="{{ url('dpto/'.$dpto->slug_dpto.'/'.$carrera->slug_carrera.'/'.$materia->slug_materia.'/'.$apunte->nombre_apunte)}}" class="btn btn-primary">Ver Apunte</a></div>
        </div>    
        @endforeach 
        
      </div>
    </section> 	
    <br>
    <br>
    <br>
@endsection