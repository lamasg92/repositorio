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
            <form name="formulario" method="POST" enctype="multipart/form-data" action="{{url('actualizarperfil')}}">
              {{csrf_field()}}
                    <img src="{{asset('imagenes/users')}}/{{Auth::user()->foto}}" class="img-thumbnail previsualizarFoto" width="200" height="200">
                    <div><h4>{!! Field::file('imagen',['class'=>'foto'] )!!}</h4></div>         
                
                <div>
                  <label for="dni">DNI: {{Auth::user()->dni}} </label>
                </div>
                  
                <div>
                  <label for="apellido">Apellido: {{Auth::user()->surname}}</label>
                </div>
                  
                 <div>
                   <label for="nombre">Nombre: {{Auth::user()->name}}</label>
                 </div>
                  
             
                  <label for="email">Email: {{Auth::user()->email}} </label>
                  <input type="button" name="cambiaremail" value="Cambiar Email">
             
                  <select class="form-control" name="carrera" id="carrera" required="true"> 
                    <option value="">-- Elija Carrera --</option>
                    @foreach($carreras as $carrera)
                      <option value="{{$carrera['id']}}">{{$carrera['nombre_carrera']}}</option>
                    @endforeach
                    </select>
                  @if(!$datosusuario->isEmpty())
                  @foreach($datosusuario as $usuario)
                  <label for="ingreso">Año Ingreso:</label>                  
                  <input type="text" id="ingreso" name="ingreso" value="{{$usuario['anio_ingreso']}}" required="true">                   
                  <label for="lu">LU:</label>
                  <input type="text" id="lu" name="lu" value="{{$usuario['libreta']}}" required="true">
                  @endforeach
                  @else
                  <label for="ingreso">Año Ingreso:</label>                  
                  <input type="text" id="ingreso" name="ingreso" value="" required="true">                   
                  <label for="lu">LU:</label>
                  <input type="text" id="lu" name="lu" value="" required="true">
                  @endif
              <div><input type="submit" value="Actualizar Datos"> </div>
                        
            </form>
          </div>
        </div>
      </div>
    </section>    

@section('js')
<script src="{{asset('stylesAdmin/js/plantilla.js')}}">
  

</script>
@endsection
@endsection
