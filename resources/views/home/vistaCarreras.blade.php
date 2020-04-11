@extends('layouts.home')

@section('content')
    <section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('../images/image_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">NOMBRE DEPARTAMENTO</h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <div class="row d-flex">
        @foreach($carreras as $car)
            <div class="card" style="width: 18rem;">
               <!--img src="..." class="card-img-top" alt="..."-->
               <div class="card-body">
                   <h5 class="card-title">{{ $car->nombre_carrera }}</h5>
                   <p class="card-text">Duración</p>
                   <a href="#" class="btn btn-primary">Ver Materias</a>
               </div>
            </div>
            
        @endforeach
        </div>
      </div>
    </section>
@endsection
