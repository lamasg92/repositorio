@extends('layouts.home')

@section('title', '| Perfil')

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

    <div class="flash-message">
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
         @if(Session::has('alert-' . $msg))
         <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
         @endif
       @endforeach
     </div> <!-- end .flash-message -->

<section class="ftco-section ftco-no-pt ftc-no-pb">
  <div class="container">
    <div class="row d-flex">

      <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
        <h2 class="mb-4">Mis datos</h2>

        <form name="formulario" method="POST" enctype="multipart/form-data" action="{{url('actualizarperfil')}}">
          {{csrf_field()}}
          <img src="{{asset('images/user/'.Auth::user()->foto)}}" class="img-thumbnail previsualizarFoto" width="200" height="200">
          <div>
            <h4>{!! Field::file('imagen',['class'=>'foto'] )!!}</h4>
          </div>         
          <div>
            <label for="dni">DNI: {{Auth::user()->dni}} </label>
          </div>              
          <div>
            <label for="apellido">Apellido: {{Auth::user()->surname}}</label>
          </div>   
          <div>
            <label for="nombre">Nombre: {{Auth::user()->name}}</label>
          </div>

          <div>
            <input type="submit"  class="btn btn-primary" value="Actualizar Datos">
          </div>
      </form> 
              
          <label for="email">Email: {{Auth::user()->email}} </label>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#emailModal" data-backdrop="false"> Cambiar Email </button>
          <br>
    @if(Auth::user()->type=='alumno')
      <div class="border-div">
        <h4>Datos acedemicos</h4>
          @if(!$datosusuario->isEmpty())
          <div class="table-responsive">
          <table class="table table-hover table-sm table-bordered table-striped">
              <thead class="">
                <tr>
                  <th scope="col">Carrera</th>
                  <th scope="col">Ingreso</th>
                  <th scope="col">LU</th>
                  <th scope="col">Eliminar</th>           
              </tr>
             </thead>
             <tbody>
             @foreach($datosusuario as $carUser)    
             <tr>
                <th scope="row">{{$carUser['nombre_carrera']}}</th>
                <th scope="row">{{$carUser->pivot['anio_ingreso']}}</th>
                <th scope="row">{{$carUser->pivot['libreta']}}</th>
                <th scope="row"><a class="btn dtn-danger" href="{{url('eliminarCarrera/'.$carUser->pivot['id'])}}">X</a></th>
              </tr>
              @endforeach 
          </tbody>  
        </table>
        </div>
        @endif

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#carreraModal" data-backdrop="false">Agregar Carrera</button> 
      </div>
    @else
      <div class="border-div">
        <h4>Datos acedemicos</h4>
          @if(!$datosusuario->isEmpty())
          <div class="table-responsive">
          <table class="table table-hover table-sm table-bordered table-striped">
              <thead class="">
                <tr>
                  <th scope="col">Materia</th>
                  <th scope="col">Estado</th>
                  <th scope="col"></th>          
              </tr>
             </thead>
             <tbody>
              @foreach($datosusuario as $materia)    
               <tr>
                  <th scope="row">{{$materia['nombre_materia']}}</th>
                  <th scope="row">{{$materia->pivot['estado']}}</th>
                  <th scope="row"><a class="btn dtn-danger" href="{{url('bajaMateria/'.$materia->pivot['id'])}}">X</a></th>
               </tr>
              @endforeach 
          </tbody>  
        </table>
      </div>
        @endif

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#materiaModal" data-backdrop="false">Agregar Materia</button> 
      </div>

    @endif
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#passModal" data-backdrop="false"> Cambiar Contraseña </button>                            
    
   </div>
  </div>
</section> 

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

            <!-- PassModal -->
            <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-hidden="true"> 
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                   <!-- Modal Body -->
                  <div class="modal-body">
                      <p class="statusMsg"></p>
                      <form name="formularioNuevaPass" method="POST" action="{{('cambiarpass')}}">
                          {{csrf_field()}}
                          <div class="form-group">
                              <label for="actualPass">Ingrese contraseña Actual</label>
                              <input type="password" class="form-control" required="true" 
                             name="actualPass" id="actualPass" />
                          </div>
                          <div class="form-group">
                              <label for="nuevaPass1">Ingrese nueva contraseña</label>
                              <input id="nuevaPass1" type="password" class="form-control" required="true" name="nuevaPass1" minlength=8  />
                          </div>
                          <div class="form-group">
                              <label for="nuevaPass2">Repita nueva contraseña</label>
                              <input id="nuevaPass2" type="password" class="form-control" required="true" name="nuevaPass2"  minlength=8  />
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
<!-- agregarCarreraModal -->
<div class="modal fade" id="carreraModal" tabindex="-1" role="dialog" aria-hidden="true"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva carrera</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
         <!-- Modal Body -->
        <div class="modal-body">
          <form name="formularioNuevaCarrera" method="POST" action="{{('agregarCarrera')}}">
                                  {{csrf_field()}}
              <div class="form-group">
                  <label for="actualPass">Carrera</label>
                    <select class="form-control" name="carrera_id" id="carrera_id" required="true"> 
                    <option value="">-- Elija Carrera --</option>
                    @foreach($carreras as $carrera)
                      <option value="{{$carrera['id']}}">{{$carrera['nombre_carrera']}}</option>
                    @endforeach
                    </select>
              </div>
              <div class="form-group">
                  <label for="anio_ingreso">Año de ingreso</label>
                  <input id="anio_ingreso" class="form-control" required="true" name="anio_ingreso"/>
              </div>
              <div class="form-group">
                  <label for="libreta">Libreta Universitaria</label>
                  <input id="libreta" class="form-control" required="true" name="libreta"/>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <input type="submit"  class="btn btn-primary" value="Agregar">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- agregarMateriaModal -->
<div class="modal fade" id="materiaModal" tabindex="-1" role="dialog" aria-hidden="true"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva materia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
         <!-- Modal Body -->
        <div class="modal-body">
          <form name="formularioNuevaMateria" method="POST" action="{{('agregarMateria')}}">
                                  {{csrf_field()}}
              <div class="form-group">
                <label for="actualPass">Carrera</label>
                  <select class="form-control" name="id_carrera" id="id_carrera" required="true">
                    <option value="">-- Elija Carrera --</option>
                  @foreach($carreras as $carrera)
                    <option value="{{$carrera['id']}}">{{$carrera['nombre_carrera']}}</option>
                  @endforeach
                  </select>
              </div>
            <div class="form-group">
              <label for="actualPass">Materia</label>
              <select class="form-control" id="materia_id" name="materia_id" required="true">
                <option value="">-- Elija una materia --</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <input type="submit"  class="btn btn-primary" value="Agregar">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
 
@endsection
@section('js')
<script type="text/javascript">
    $("#id_carrera").change(function(event){
      $.get("getCarreraMateria/"+event.target.value+"",function(response,id_carrera){
          $("#materia_id").empty();
            for(i=0; i<response.length; i++){
              $("#materia_id").append("<option value='"+response[i].id+"'>"+response[i].nombre_materia+"</option>");
            }
       });
    });  
</script>
@endsection
