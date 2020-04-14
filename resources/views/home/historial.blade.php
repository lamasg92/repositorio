@extends('layouts.home')

@section('content')

  <section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('images/image_0.jpg');">

      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Historial</h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <div class="row d-flex">
      
          <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
            <h2 class="mb-4">Apuntes subidos</h2>
            <p>Estos son los apuntes que subi</p>
            <ul>
             @foreach($apuntesdocente as $apunte)    
             <li>            
              <label for="name">{{$apunte['nombre_apunte']}}</label>
              <p></p>
              <label for="name">{{$apunte['nombre_materia']}}</label>
              <p></p>
              <label for="archivo">{{$apunte['archivo']}}</label>
              <a href="{{asset('apuntes/'.$apunte->archivo)}}" target="_blank">ver</a>
              <p></p>
              <label for="autor">{{$apunte['autores']}}</label>
              <p></p>
              <label for="fecha">{{$apunte['created_at']}}</label>
            </li>
            @endforeach 
            </ul>       
          </div>
        </div>
      </div>
    </section>    

@endsection

