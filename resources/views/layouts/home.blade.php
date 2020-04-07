<!DOCTYPE html>
<html lang="en">
  <head>
    <title>UNIVERSIDAD NACIONAL DE SALTA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	  <div class="bg-top navbar-light">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="#">REPOSITORIO DE APUNTES <span>Facultad de Ciencias Exactas</span></a>
    			</div>

	    	</div>
		  </div>

		  <div class="container">
		  <div class=class="col-lg-8 d-block" align="right">
           		@if (Route::has('login'))
                	<div class="top-rigth links">
                    @auth 
                    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
					    <div class="container d-flex align-items-center px-4">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					        	<span class="oi oi-menu"></span> Menu
					      </button>
					      <form action="#" class="searchform order-lg-last">
				          <div class="form-group d-flex">
				            <input type="text" class="form-control pl-3" placeholder="Buscar">
				            <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
				          </div>
				        </form>
					      <div class="collapse navbar-collapse" id="ftco-nav">
					        <ul class="navbar-nav mr-auto">
					        	<li class="nav-item active"><a href="#" class="nav-link pl-0">Home</a></li>
					        	<li class="nav-item"><a href="#" class="nav-link pl-0">Mi Perfil</a></li>
					        	<li class="nav-item"><a href="{{ route('logout')}}" class="nav-link pl-0">Cerrar Sesión</a></li>
					        </ul>
					      </div>
					    </div>
					  </nav>                  	
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Ingresar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary" >Registrarse</a>
                        @endif
                     <div><p></p></div>
                    @endauth             
                	</div>
            	@endif
        	</div>
        </div>
    </div>
   
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
                <h3><a href="http://di.unsa.edu.ar/"  target="_blank" style="color: white" >Departamento de Informática</a> </h3>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
              <div class="media-body p-2 mt-3">
                <h3><a href="#" style="color: white" >Departamento de Matemática</a> </h3>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="media-body p-2 mt-3">
                <h3><a href="#" style="color: white" >Departamento de Física</a> </h3>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
                <div class="media-body p-2 mt-3">
                <h3><a href="http://quimica.unsa.edu.ar/" target="_blank" style="color: white" >Departamento de Quimica</a> </h3>
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
		
		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart" aria-hidden="true"></i>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>