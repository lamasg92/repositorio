<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panel de Control</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('stylesAdmin/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('stylesAdmin/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('stylesAdmin/dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('stylesAdmin/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('stylesAdmin/plugins/morris/morris.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('stylesAdmin/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('stylesAdmin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('stylesAdmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="{{asset('stylesAdmin/plugins/chosen/chosen.css')}}">

    @yield('style')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script> 
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="{{route('admin')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Repositorio Apuntes</b></span> 
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">            
    <!-- User Account: style can be found in dropdown.less -->

        <!-- Authentication Links -->
       @if (Auth::guest())

       @else
         
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
            <img src="{{asset('imagenes/users/'.Auth::user()->foto)}}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
            <!-- User image -->
              <li class="user-header">
               <img src="{{asset('imagenes/users/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
              </li>
            <!-- Menu footer-->
                <li class="user-footer">
                  <div class="pull-left">
                  <a >Perfil</a>
                 </div>
                <div class="pull-right">
                   <a href="{{ route('logout') }}" class="btn btn-default btn-flat" id="logout"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Salir
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input type="submit" value="logout" style="display: none;">
                   </form>
                </div>     
               </li>
             </ul>
          </li> 
        @endif   
       

      </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('imagenes/users/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
               <p>{{ Auth::user()->name }}</p>
             <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
          </div>
          
          <ul class="sidebar-menu">
            <li class="header">MENU PRINCIPAL</li>

            <li class="treeview">
              <a href="#">
                 <i class="fa fa-circle"></i>
                 <span>Gestor de Departamentos</span> <i class="fa fa-angle-left pull-right"></i>
                 </a>
                 <ul class="treeview-menu">
                <li class="active"><a href="{{route('departamentos.index')}}"><i class="fa fa-circle-o"></i>Lista de departamentos</a></li>
                
                </ul>
            </li>

              <li class="treeview">
              <a href="#">
                 <i class="fa fa-circle"></i>
                 <span>Gestor de Carreras</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                 <ul class="treeview-menu">
                <li class="active"><a href="{{route('carreras.index')}}"><i class="fa fa-circle-o"></i>Lista de Carreras</a></li>
                
                </ul>
            </li>

            <li class="treeview">
              <a href="#">
                 <i class="fa fa-circle"></i>
                 <span>Gestor de Materias</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                 <ul class="treeview-menu">
                <li class="active"><a href="{{route('materias.index')}}"><i class="fa fa-circle-o"></i>Lista de Materias</a></li>
                
                </ul>
            </li>

              <li class="treeview">
              <a href="#">
                 <i class="fa fa-circle"></i>
                 <span>Gestor de Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                 <ul class="treeview-menu">

                <li class="active"><a href="{{url('admin/user', 'docente')}}" ><i class="fa fa-circle-o"></i>Lista de Docentes</a></li>

                <li class="active"><a href="{{url('admin/user', 'alumno') }}" ><i class="fa fa-circle-o"></i>Lista de Alumnos</a></li>

                <li class="active"><a href="{{url('admin/user', 'admin') }}" ><i class="fa fa-circle-o"></i>Lista de Administradores</a></li>
                                
                </ul>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
     
        <!-- Main content -->
        <section class="content">

        @include('flash::message') 
       
        @yield('content')

        </section>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer no-print">

        <strong>Copyright &copy; 2020. Todos los derechos reservados</strong> 
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 3.5.0 -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('stylesAdmin/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('stylesAdmin/plugins/morris/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('stylesAdmin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('stylesAdmin/plugins/knob/jquery.knob.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('stylesAdmin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('stylesAdmin/plugins/datepicker/locales/bootstrap-datepicker.es.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('stylesAdmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('stylesAdmin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('stylesAdmin/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('stylesAdmin/dist/js/app.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('stylesAdmin/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('stylesAdmin/dist/js/demo.js')}}"></script>
  
    <script src="{{asset('stylesAdmin/plugins/chosen/chosen.jquery.js')}}"></script>

    <script src="{{asset('stylesAdmin/js/plantilla.js')}}"></script>

    <script src="{{asset('stylesAdmin/stringToSlug/jquery.stringToSlug.min.js') }}"></script>

   
    @yield('js')
    @stack('scripts')


    
    <script>
      function baseUrl(url){
        return "{{url('')}}/"+url;
      }
    </script>
  </body>
</html>