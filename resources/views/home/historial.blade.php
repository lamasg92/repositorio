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
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nombre Archivo</th>
                  <th scope="col">Materia</th>
                  <th scope="col">#</th>
                  <th scope="col"></th>
                  <th scope="col">Autor/es</th>
                  <th scope="col">Fecha subida</th>
                  <th scope="col"> </th>               
              </tr>
             </thead>
             <tbody>
             @foreach($apuntesdocente as $apunte)    
             <tr>
                <th scope="row">{{$apunte['nombre_apunte']}}</th>
                <th scope="row">{{$apunte->materia['nombre_materia']}}</th>
                <th scope="row">{{$apunte['archivo']}}</th>
                <th scope="row"> <a href="{{asset('apuntes')}}/{{$apunte['archivo']}}" target="_blank">ver</a></th>
                <th>{{$apunte['autores']}}</th>
                <th>{{$apunte['created_at']}}</th>
                <th><a href="#" type="button" class="btn btn-primary" >Modificar</a></th>
              </tr>
              @endforeach 
              </tbody>  
            </table>  
          </div>
        </div>
      </div>
    </section>  
    <br> 
@endsection

