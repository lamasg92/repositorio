@extends('layouts.home')

@section('title', '| Historial')

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
          @if(!$apuntesdocente->isEmpty())
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nombre Archivo</th>
                  <th scope="col">Materia</th>
                  <th scope="col"></th>
                  <th scope="col">Autor/es</th>
                  <th scope="col">Fecha subida</th>
                  <th scope="col"> </th>     
                  <th scope="col"> </th>          
              </tr>
             </thead>
             <tbody>
             @foreach($apuntesdocente as $apunte)    
             <tr>                
                <th scope="row">{{$apunte['nombre_apunte']}}</th>
                <th scope="row">{{$apunte['nombre_materia']}}</th>
                <th scope="row"> <a href="{{asset('apuntes')}}/{{$apunte['archivo']}}" target="_blank">{{$apunte['archivo']}}</a></th>
                <th>{{$apunte['autores']}}</th>
                <th>{{$apunte['created_at']}}</th>
                @if($apunte['estado'] == 'activo')
                  <th><a href="{{url('modificar',['id_apunte' => $apunte->id])}}" type="button" class="btn btn-primary" >Modificar</a></th></th>
                  <th><a onclick="return confirm('Seguro que quiere eliminar?')" href="{{url('eliminar',['id_apunte' => $apunte->id])}}" type="button" class="btn btn-danger" >Eliminar</a></th></th>
                @else
                  <th scope="row">Este archivo está inactivo</th>
                @endif               
              </tr>
              @endforeach 
              </tbody>  
            </table>  
          </div>
          @else
          <div class="table-responsive">
            <table class="table">
              <thead>
              <th >Usted no ha subido ningun apunte</th>
              </thead>
            </table>              
          </div>
          @endif
        </div>
      </div>
    </section>  
    <br> 
@endsection

