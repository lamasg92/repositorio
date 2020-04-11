@extends('layouts.home')

@section('content')

        @foreach($carreras as $car)
            <div class="card" style="width: 18rem;">
               <img src="..." class="card-img-top" alt="...">
               <div class="card-body">
                   <h5 class="card-title">{{ $car->nombre_carrera }}</h5>
                   <p class="card-text">Duración</p>
                   <a href="#" class="btn btn-primary">Ver Materias</a>
               </div>
            </div>
            
        @endforeach

@endsection
