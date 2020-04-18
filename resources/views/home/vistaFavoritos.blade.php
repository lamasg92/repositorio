@extends('layouts.home')

@section('content')
    <section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('images/image_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Mis Favoritos</h1>
          </div>
        </div>
      </div>
    </section>
    <br>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container justify-content-center">
         	
        @foreach($lista as $list)
        <div class="row slider-text align-items-center border border-dark rounded">
        	<div class="col-md-2 text-center">
        	<img src="images/iconoApunte.png" style="width: 50px; height: 50px;" alt="Responsive image"></div>
            <div class="col-md-8"><a style="color: #176e4c; font-size: 20px;">Titulo: {{ $list->nombre_apunte }}</a> - Autor: {{ $list->autores }} - Materia: {{ $list->nombre_materia }}</div>
            <div class="col-md-2 text-center"><a href="{{ url('mostrar/'.$list->carrera_id.'/'.$list->slug_materia.'/'.$list->nombre_apunte)}}" class="btn btn-primary">Ver Apunte</a></div>
        </div>    
        @endforeach     	
    
      </div>
    </section>    
    <br>
    <br>
    <br>    
@endsection