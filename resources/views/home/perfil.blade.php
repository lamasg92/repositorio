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
                    <img src="{{asset('images/user/'.Auth::user()->foto)}}" class="img-thumbnail previsualizarFoto" width="200" height="200">
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#emailModal" data-backdrop="false"> Cambiar Email </button>
                            

                  @if(!$datosusuario->isEmpty())
                    <select class="form-control" name="carrera" id="carrera" required="true"> 
                    <option value="">-- Elija Carrera --</option>
                    @foreach($datosusuario as $usuario)
                    <option selected="true" value="{{$usuario['carrera_id']}}">{{$usuario['nombre_carrera']}}</option>
                    @endforeach
                    @foreach($carreras as $carrera)
                    @if($carrera->nombre_carrera != $usuario->nombre_carrera)
                      <option value="{{$carrera['id']}}">{{$carrera['nombre_carrera']}}</option>
                    @endif
                    @endforeach
                    </select>
                  @else
                    <select class="form-control" name="carrera" id="carrera" required="true"> 
                    <option value="">-- Elija Carrera --</option>
                    @foreach($carreras as $carrera)
                      <option value="{{$carrera['id']}}">{{$carrera['nombre_carrera']}}</option>
                    @endforeach
                    </select>
                  @endif
             
                  
                  @if(!$datosusuario->isEmpty())
                  @foreach($datosusuario as $usuario)
                  <label for="ingreso">Año Ingreso:</label>                  
                  <input type="text" pattern="\d*"  id="ingreso" name="ingreso" value="{{$usuario['anio_ingreso']}}" required="true">                   
                  <label for="lu">LU:</label>
                  <input type="text" pattern="\d*" name="lu" value="{{$usuario['libreta']}}" required="true">
                  @endforeach
                  @else
                  <label for="ingreso">Año Ingreso:</label>                  
                  <input type="text" pattern="\d*" id="ingreso" name="ingreso" value="" required="true">            
                  <label for="lu">LU:</label>
                  <input type="text" pattern="\d*" id="lu" name="lu" value="" required="true">
                  @endif
              <div><input type="submit"  class="btn btn-primary" value="Actualizar Datos"></div>
                        
            </form>                     

          </div>
               

           <!-- EmailModal -->
            <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-hidden="true"> 
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                   <!-- Modal Body -->
                  <div class="modal-body">
                      <p class="statusMsg"></p>
                      <form name="formularioEmail" method="POST" action="{{('cambiaremail')}}">
                          {{csrf_field()}}
                          <div class="form-group">
                              <label for="nuevoEmail">Nuevo Email</label>
                              <input type="email" class="form-control" required="true" 
                             name="nuevoemail" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" id="nuevoemail" />
                          </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <input type="submit"  class="btn btn-primary" value="Actualizar">
                        </div>
                        </form>
                  </div>
                  
                </div>
              </div>
            </div>

        </div>
      </div>
    </section>    

@section('js')
<script src="{{asset('stylesAdmin/js/plantilla.js')}}">
  

</script>
@endsection
@endsection
