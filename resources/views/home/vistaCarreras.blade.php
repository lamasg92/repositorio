@extends('layouts.home')

@section('navegacion')
  {{ Breadcrumbs::render('dpto.carreras',$dpto) }}
@endsection

@section('content')
    
  <section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('{{asset("/images/departamento/".$dpto->logo)}}');">
      
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread"><?php echo $dpto->nombre_dpto; ?><br>Repositorio</h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <div class="row d-flex">
        @foreach($carreras as $car)
            <div class="card" style="width: 18rem;">
               <!--img src="{{ $car->imagen }}" class="card-img-top" alt="Img Carrera"-->
               <div class="card-body">
                   <h5 class="card-title">{{ $car->nombre_carrera }}</h5>
                   <p class="card-text">Plan: {{ $car->anio_plan }} <br> Duración: {{ $car->duracion }}</p>
                   <a href="{{ url('dpto/'.$dpto->slug_dpto.'/'.$car->slug_carrera) }}" class="btn btn-primary">Ver Materias</a>
               </div>
            </div>
            
        @endforeach
        </div>
      </div>
    </section>
@endsection
