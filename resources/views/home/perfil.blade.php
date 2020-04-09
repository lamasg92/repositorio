@extends('layouts.home')

@section('content')  
    <section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('images/image_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Editar Perfil</h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <div class="row d-flex">
      <!-- En mantenimiento -->
          <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
            @include('layouts.mantenimiento')
          </div>

        </div>
      </div>
    </section>
 @endsection