@extends('layouts.home')

@section('content')

  <section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.6" style="background-image: url('images/image_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Modificar Apuntes</h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
            <h2 class="mb-4">Modificar apunte</h2>        
          </div>
        </div>
        @foreach($datosapunte as $dato)
      <form action="{{url('modificarapunte',['id_apunte' => $dato->id])}}" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}        
        
      <div class="form-group">
        <input type="text" class="form-control" id="nombre_apunte" name="nombre_apunte" aria-describedby="emailHelp" value="{{$dato['nombre_apunte']}}" placeholder="nombre apunte" required="true">
      </div>
      <div class="form-group">
        <select class="form-control" name="materia_id" id="materia_id" required="true"> 
            <option value="">-- Elija una materia --</option>
            <option selected="true" value="{{$dato['materia_id']}}">{{$dato['nombre_materia']}}</option>
            @foreach($materiasdocente as $materia)
            @if($materia->nombre_materia != $dato->nombre_materia)
              <option value="{{$materia['id']}}">{{$materia['nombre_materia']}}</option>
            @endif
            @endforeach
        </select>
      </div>
       <div class="form-group">
          <input type="text" class="form-control" id="archivo" name="archivo" value="{{$dato['archivo']}}" required="true" readonly="true" >
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="autores" name="autores" value="{{$dato['autores']}}" required="true" placeholder="autor">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Datos</button>
      </form>
      @endforeach
      </div>
     
    </section>  
    <div><p></p></div>  
    
@endsection