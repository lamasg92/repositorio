@extends('layouts.home')

@section('content')
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/universidad.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">Universidad Nacional de Salta</h1>
            <p>Universidad publica y gratuita</p>
            <p>Avenida 5150</p>
            <p>Salta - Argentina</p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/unsa2.jpeg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">Facultad de Ciencias Exactas</h1>
            <p>Cuenta con 4 departamentos</p>
            <p>Tiene 14 carreras</p>
            </div>
        </div>
        </div>
      </div>
    </section>

    <section class="ftco-services ftco-no-pb">
        <div class="container-wrap">
        <div class="row no-gutters">
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="media-body p-2 mt-3">
                  @if (Route::has('login'))
                   @auth
                        <h3><a href="{{ url('dpto/departamento-de-informatica')}}" style="color: white" >Departamento de Informática</a> </h3>
                   @else
                        <h3><a href="#" style="color: white" >Departamento de Informática</a> </h3>
                   @endauth
                  @endif
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
              <div class="media-body p-2 mt-3">
                  @if (Route::has('login'))
                   @auth 
                        <h3><a href="{{ url('dpto/departamento-de-matematica')}}" style="color: white" >Departamento de Matemática</a> </h3>
                   @else
                        <h3><a href="#" style="color: white" >Departamento de Matemática</a> </h3>
                   @endauth
                  @endif
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="media-body p-2 mt-3">
                @if (Route::has('login'))
                   @auth 
                        <h3><a href="{{ url('dpto/departamento-de-fisica')}}" style="color: white" >Departamento de Física</a> </h3>
                @else
                        <h3><a href="#" style="color: white" >Departamento de Física</a> </h3>
                   @endauth
                  @endif
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
                <div class="media-body p-2 mt-3">
                    @if (Route::has('login'))
                     @auth 
                        <h3><a href="{{ url('dpto/departamento-de-quimica')}}" target="_blank" style="color: white" >Departamento de Química</a> </h3>
                    @else
                        <h3><a href="#" style="color: white" >Departamento de Química</a> </h3>
                   @endauth
                  @endif
                </div>
            </div>      
          </div>
        </div>
            </div>
        </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">AUTORIDADES DE LA FACULTAD</h2>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/decano.png)">
                  </div>
                  <div class="text ml-2">
                    <p class="name">Ing. Daniel Hoyos</p>
                    <span class="position">DECANO</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/vicedecano.png)">
                  </div>
                  <div class="text ml-2">
                    <p class="name">Mag. Gustavo D. Gil</p>
                    <span class="position">Vice-DECANO</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/secretaria.png)">
                  </div>
                  <div class="text ml-2">
                    <p class="name">Dra. Maria Rita Martearena</p>
                    <span class="position">SECRETARIA ACEDÉMICA Y DE INVESTIGACIÓN</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4">
                  </div>
                  <div class="text ml-2">
                    <p class="name">Ing. Walter Alberto Garzón</p>
                    <span class="position">SECRETARIO DE EXTENSIÓN Y BIENESTAR</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        <section class="ftco-section">
            <div class="container-fluid px-4">
                <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Carreras</h2>
          </div>
        </div>  
                <div class="row">
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/las.jpg);"></div>
                            <h3><a href="#">Licenciatura en Analisis de Sistemas</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>INFORMATICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 5 años</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/tup.jpg);"></div>
                            <h3><a href="#">Tecn. Universitaria en Programación</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>INFORMATICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 3 años</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/pm.jpg);"></div>
                            <h3><a href="#">Profesorado en Matematicas</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>MATEMATICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 5 años</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/pm.jpg);"></div>
                            <h3><a href="#">Licenciatura en Matemáticas</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>MATEMATICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 5 años</span>
                            </p>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/pm.jpg);"></div>
                            <h3><a href="#">Tecn. Universitaria en Estadisticas</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>Matematica</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 3 años</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/quimica.jpg);"></div>
                            <h3><a href="#">Licenciatura en Química</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>QUIMICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 5 años</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/quimica.jpg);"></div>
                            <h3><a href="#">Profesorado en Quimica</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>Quimica</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 5 años</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/quimica.jpg);"></div>
                            <h3><a href="#">Bromatologia</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>QUIMICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 5 años</span>
                            </p>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/quimica.jpg);"></div>
                            <h3><a href="#">Analista quimico</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>QUIMICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 3 años</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/fisica.jpg);"></div>
                            <h3><a href="#">Licenciatura en Fisica</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>FISICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 5 años</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/fisica.jpg);"></div>
                            <h3><a href="#">Profesorado en fisica</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>FISICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 5 años</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 course ftco-animate">
                        <div class="text pt-4">
                            <div class="img" style="background-image: url(images/fisica.jpg);"></div>
                            <h3><a href="#">Tecn. Electrónica Universitaria</a></h3>
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>FISICA</span>
                                <span><i class="icon-calendar mr-2"></i>Duracion: 3 años</span>
                            </p>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </section>
@endsection
