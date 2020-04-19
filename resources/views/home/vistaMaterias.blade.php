@extends('layouts.home')

@section('navegacion')
  {{ Breadcrumbs::render('dpto.materias', $dpto ,$carrera) }}
@endsection

@section('content')
	
	<section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('{{asset("/images/carrera/".$carrera->imagen)}}');">
      
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">

					   <h3 class="mb-2 bread font-responsive-4"><a href="{{ url('dpto/$dpto->slug_dpto')}}">
              {{$dpto->nombre_dpto}}</a> <br/>{{$carrera->nombre_carrera}}
             <br>Repositorio</h3>
          </div>
        </div>
      </div>
    </section>
	<br>
	<section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container justify-content-center">
        <div class="row d-flex">      
          <div class="table-responsive">
            <table class="table table-hover table-sm table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Año</th>
                  <th scope="col">Cuatrimestre</th>
                  <th scope="col">Materia</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Apuntes</th>             
              </tr>
             </thead>
             <tbody>
             @foreach($materias as $materia)    
             <tr>
                <th scope="row">{{$materia['anio']}}° año</th>
                <th scope="row">{{$materia['semestre']}}</th>
                <th scope="row">{{$materia['nombre_materia']}}</th>
                <th scope="row">{{$materia['tipo']}}</th>
                @if(!empty($materia->apuntes)&&(count($materia->apuntes)>0))
                <th scope="row"><a href="{{url('dpto/'.$dpto->slug_dpto.'/'.$carrera->slug_carrera.'/'.$materia->slug_materia )}}">ver</a></th>
                @else
                <th scope="row">ver</th>
                @endif
              </tr>
              @endforeach 
              </tbody>  
            </table>  
          </div>
        </div>       
      </div>
    </section> 	
@endsection