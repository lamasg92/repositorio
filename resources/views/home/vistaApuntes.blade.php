@extends('layouts.home')

@section('content')
	
	<section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('../images/image_0.jpg');">
      
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          		@if(strpos($nombDpto, 'Informática') !== false)
					<h3 class="mb-2 bread"><a href="{{ url('vistaCar/1')}}">
						<?php echo $nombDpto; ?></a> <br/>
						<a href="{{ url('vistaMaterias/'.$idCarr.'/'.$nombDpto) }}">
							<?php echo $nombCarr; ?></a><br><?php echo $nombMat; ?><br>Apuntes</h3>
				@endif
            	@if(strpos($nombDpto, 'Matemática') !== false)
					<h3 class="mb-2 bread"><a href="{{ url('vistaCar/2')}}">
						<?php echo $nombDpto;?></a> <br/>
						<a href="{{ url('vistaMaterias/'.$idCarr.'/'.$nombDpto) }}">
							<?php echo $nombCarr; ?></a><br><?php echo $nombMat; ?><br>Apuntes</h3>
				@endif
				@if(strpos($nombDpto, 'Química') !== false)
					<h3 class="mb-2 bread"><a href="{{ url('vistaCar/3')}}">
						<?php echo $nombDpto; ?></a> <br/>
						<a href="{{ url('vistaMaterias/'.$idCarr.'/'.$nombDpto) }}">
							<?php echo $nombCarr; ?></a><br><?php echo $nombMat; ?><br>Apuntes</h3>
				@endif
				@if(strpos($nombDpto, 'Física') !== false)
					<h3 class="mb-2 bread"><a href="{{ url('vistaCar/4')}}">
						<?php echo $nombDpto; ?></a> <br/>
						<a href="{{ url('vistaMaterias/'.$idCarr.'/'.$nombDpto) }}">
							<?php echo $nombCarr; ?></a><br><?php echo $nombMat; ?><br>Apuntes</h3>
				@endif
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        
        	@foreach($apuntes as $apu)
        	<div class="row d-flex">
        		<div class="col-md-9 ftco-animate">
        		<a href="#" style="color: blue" >{{ $apu->nombre_apunte }} -- Autor/es: {{ $apu->autores }}</a> 
        		</div>
        	</div>
        	@endforeach
        
      </div>
    </section> 	
@endsection