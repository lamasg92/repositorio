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
      </div>

      <div class="container">
          <div class=class="col-lg-8 d-block" align="right">
                @if (Route::has('login'))
                    <div class="top-rigth links">
                    @auth
                        <a href="{{ route('logout')}}" class="btn btn-primary">Cerrar Sesión</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Ingresar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary" >Registrarse</a>
                        @endif
                    @endauth               
                    </div>
                @endif
            </div>
        </div>

        <div class="text ml-2">
        <span class="position"><p></p></span>
    </div>

      <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(images/clases.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-12">
                    <div class="py-md-5">
                      <div class="heading-section heading-section-white ftco-animate mb-5">
                        <h2 class="mb-4">{{ __('Registrarse') }}</h2>
                      </div>
                      <form method="POST" class="appointment-form ftco-animate" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row" align="center">
                                <div class="col-md-6">
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" class="appointment-form ftco-animate" placeholder="DNI" autofocus >
                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" align="center">
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" placeholder="Apellido" class="appointment-form ftco-animate" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" align="center" >
                           <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" align="center">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" align="center" >
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" align="center" >
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row" align="center">
                            <div class="col-md-6" align="center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarme') }}
                                </button>
                            </div>
                        </div>
                    </form>                 
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
