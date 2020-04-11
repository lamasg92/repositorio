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
      
          <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
            <h2 class="mb-4">Mis datos</h2>
            <form name="formulario" method="post" action="http://pagina.com/send.php">
              <ul>
                <li>
                  <label for="dni">DNI:</label>
                <input type="dni" name="dni" readonly placeholder='{{Auth::user()->dni}}'>
                </li>
                <li>
                  <label for="apellido">Apellido:</label>
                <input type="apellido" name="apellido" readonly placeholder='{{Auth::user()->surname}}'>
                </li>
                <li>
                  <label for="nombre">Nombre:</label>
                  <input type="nombre" name="nombre" readonly placeholder='{{Auth::user()->name}}'>
                </li>
                <li>
                  <label for="email">Email:</label>
                  <input type="email" name="email" readonly placeholder='{{Auth::user()->email}}'>
                </li>
              </ul>              
            </form>
          </div>
        </div>
      </div>
    </section>    

@endsection