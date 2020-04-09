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
            <a class="navbar-brand" href="{{route('home')}}">REPOSITORIO DE APUNTES <span>Facultad de Ciencias Exactas</span></a>
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
                      <span class="oi oi-menu"></span> Menu Docente
                  </button>
                  <form action="#" class="searchform order-lg-last">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control pl-3" placeholder="Buscar">
                      <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
                    </div>
                  </form>
                  <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item"><a href="{{url('/')}}" class="nav-link pl-0"><FONT SIZE=4>Home</FONT></a></li>
                      <li class="nav-item"><a href="{{url('/subida/')}}" class="nav-link pl-0"><FONT SIZE=4>Subir Apuntes</FONT></a></li>
                      <li class="nav-item"><a href="{{url('/historial/')}}" class="nav-link pl-0"><FONT SIZE=4>Historial</FONT></a></li>
                      <li class="nav-item"><a href="{{url('/perfil/')}}" class="nav-link pl-0"><FONT SIZE=4>Mi Perfil</FONT></a></li>
                      <li class="nav-item"><a href="{{ route('logout')}}" class="nav-link pl-0"><FONT SIZE=4>Cerrar Sesión</FONT></a></li>
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

        <form>
      <div class="form-group">
        <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre del archivo">
      </div>
        <div class="form-group">
        <select class="form-control" name="materia" id="materia_id"> 
            
        </select>
      </div>
      <div class="form-group">
          <input type="file" class="form-control" id="archivo">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="autor" placeholder="autor">
        </div>
        <button type="submit" class="btn btn-primary">Subir apunte</button>
      </form>

      </div>
    </section>  
    <div><p></p></div>  
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