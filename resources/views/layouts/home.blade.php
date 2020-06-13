<!DOCTYPE html>
<html lang="en">
  <head>
    <title> UNSa | Exactas @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- imagen para redes -->
    <meta property="og:image" content="@yield('ogImage', asset('images/portada.jpg'))"/>
    <meta property="og:image:width" content="620"/>
    <meta property="og:image:height" content="465"/>
    <!--        fin        -->
    <link rel="shortcut icon" type="image/x-ico" href="{{ asset('images/ico-portada.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/new-style.css')}}">
    
  </head>
  <body>
	  <div class="bg-top navbar-light">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand font-responsive-5" href="{{url('/')}}">REPOSITORIO DE APUNTES <span>Facultad de Ciencias Exactas</span></a>
    			</div>
	    	</div>
		  </div>
    </div>

  <div class="container">
    <div class="col-lg-12 d-block" align="right">
          @if (Route::has('login'))                 
                <div class="top-rigth links">
              @auth 
            <div class="menu">
              <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
                  <div class="container d-flex align-items-center px-4">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="oi oi-menu"></span> Menu
                  </button>
              @if (Auth::user()->type == 'alumno')
                    <div class="collapse navbar-collapse" id="ftco-nav">
                      <ul class="navbar-nav mr-auto">
                      <li class="nav-item"><a href="{{url('/')}}" class="nav-link pl-0"><FONT SIZE=4>Home</FONT></a></li>
                      <li class="nav-item"><a href="{{url('favoritos')}}" class="nav-link pl-0"><FONT SIZE=4>Favoritos</FONT></a></li>
                      <li class="nav-item"><a href="{{url('perfil')}}" class="nav-link pl-0"><FONT SIZE=4>Mi Perfil</FONT></a></li>
                      <li class="nav-item"><a href="{{ route('logout')}}" class="nav-link pl-0"><FONT SIZE=4>Cerrar Sesión</FONT></a></li>
                      </ul>
                   </div>
               @else                  
                    <div class="collapse navbar-collapse" id="ftco-nav">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{url('/')}}" class="nav-link pl-0"><FONT SIZE=4>Home</FONT></a></li>
                        <li class="nav-item"><a href="{{url('subida')}}" class="nav-link pl-0"><FONT SIZE=4>Subir Apuntes</FONT></a></li>
                        <li class="nav-item"><a href="{{url('historial')}}" class="nav-link pl-0"><FONT SIZE=4>Historial</FONT></a></li>
                        <li class="nav-item"><a href="{{url('perfil')}}" class="nav-link pl-0"><FONT SIZE=4>Mi Perfil</FONT></a></li>
                        <li class="nav-item"><a href="{{ route('logout')}}" class="nav-link pl-0"><FONT SIZE=4>Cerrar Sesión</FONT></a></li>
                      </ul>
                    </div> 
                @endif  
                    <!--form action="#" class="searchform order-lg-last">
                      <div class="form-group d-flex">
                        <input type="text" class="form-control pl-3" placeholder="Buscar">
                        <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
                      </div>
                    </form-->
                 </div>
              </nav>  
            </div>  
            @else
              <a href="{{ route('login') }}" class="btn btn-primary">Ingresar</a>
                @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="btn btn-primary" >Registrarse</a>
                @endif
                 <div><p></p></div>
                @endauth             
              </div>
            @endif
        @yield('navegacion')
        </div>
  </div>
		
   </body>   
   @yield('content') <!-- Acá va lo que cambia -->
		
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


  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('js/google-map.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script>
      $('#flash-overlay-modal').modal();
  </script>

  <script type="text/javascript">
      $(document).ready(function(){
        var altura = $('.menu').offset().top;
        
        $(window).on('scroll', function(){
          if ( $(window).scrollTop() > altura ){
            $('.menu').addClass('menu-fixed');
          } else {
            $('.menu').removeClass('menu-fixed');
          }
        });
      });
  </script>
     @yield('js')
  </body>
</html>
