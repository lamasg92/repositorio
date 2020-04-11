@extends('layouts.home')

@section('content')

  <section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('images/image_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Subir Apuntes</h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
            <h2 class="mb-4">Subir un apunte</h2>
            <p>Todos los campos son obligatorios</p>           
          </div>
        </div>

      <form action="{{url('subirapunte',['id_user'=>Auth::user()->id])}}" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}

      <div class="form-group">
        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre del archivo" required="true">
      </div>
        <div class="form-group">
        <select class="form-control" name="materia" id="materia_id" required="true"> 
            <option value="">-- Elija una materia --</option>
            @foreach($materiasdocente as $materia)
              <option value="{{$materia['id']}}">{{$materia['nombre_materia']}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
          <input type="file" class="form-control" id="archivo" name="archivo" required="true">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="autor" name="autor" required="true" placeholder="autor">
        </div>
        <button type="submit" class="btn btn-primary">Subir apunte</button>
      </form>
      </div>
    </section>  
    <div><p></p></div>  
    
@endsection