<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de gestion</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/_all-skins.css')}}">
  <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
  <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
  <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  <style>
    .loading {
      display: none;
      justify-content: center;
    }

       .navbar-nav>.user-menu>.dropdown-menu>li.user-header {
                height: 80px;
                padding: 20px;
                text-align: center;

              }
  </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
  @guest
 <center><img style="margin-top:55px" src="{{asset('/img/SesionExpirada.png')}}"></center>
 <center><h4><a href="{{url('/')}}">Volver a iniciar sesión</h4></center>
  @else
  <div class="wrapper">
    <header class="main-header">

      <!-- Logo -->
      <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          <b>TM</b>
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
          <b>Transportes Muñoz</b>
        </span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
    
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
        
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
    
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <small class="bg-green"> En línea </small>&emsp; {{ Auth::user()->name }}
                <span class="hidden-xs"> </span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <p>
                    Sistema de Gestion
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">

                  <div class="pull-right">
                    <a href="{{ route('logout') }}" class="buttonn" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                      Cerrar Sesion <i class="fa fa-sign-out"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>

      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header"></li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Operaciones</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            @can('workers.index')
              <li>
                <a href="{{url('/admin/work_orders')}}">
                  <i class="fa fa-clipboard"></i>OT</a>
              </li>
              <li>
                <a href="{{url('/admin/contracts')}}">
                  <i class="fa fa-briefcase"></i>Orden de Negocio</a>
              </li>
            @endcan
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Administración</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            @can('workers.index')
              <li>
                <a href="{{url('/admin/work_orders')}}">
                  <i class="fa fa-clipboard"></i>Clientes</a>
              </li>
              <li>
                <a href="{{url('/admin/contracts')}}">
                  <i class="fa fa-briefcase"></i>Fleteros</a>
              </li>
              <li>
                <a href="{{url('/admin/contracts')}}">
                  <i class="fa fa-briefcase"></i>Tipo Vehículo</a>
              </li>
              <li>
                <a href="{{url('/admin/contracts')}}">
                  <i class="fa fa-briefcase"></i>Modelo Vehículo</a>
              </li>
              <li>
                <a href="{{url('/admin/contracts')}}">
                  <i class="fa fa-briefcase"></i>Productos</a>
              </li>
            @endcan
            </ul>
          </li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Gestion Personas</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            @can('workers.index')
              <li>
                <a href="{{url('/admin/workers')}}">
                  <i class="fa fa-clipboard"></i>Registro de Trabajadores</a>
              </li>
              <li>
                <a href="{{url('/admin/contracts')}}">
                  <i class="fa fa-briefcase"></i>Contratos</a>
              </li>
            @endcan
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-th"></i>
              <span>Inventario</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            @can('inventories.index')
              <li>
                <a href="{{url('/admin/inventories')}}">
                  <i class="fa fa-gg"></i>Control de Inventario</a>
              </li>
            @endcan      
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-flask"></i>
              <span>Productos Quimicos</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            @can('chemicals.chemicals_in')
              <li>
                <a href="{{url('/admin/chemicals_in')}}">
                  <i class="fa fa-eye"></i>Control de Químicos</a>
              </li>
            @endcan
            @can('chemicals.chemicals_out')
              <li>
                  <a href="{{url('/admin/chemicals_out')}}">
                    <i class="fa fa-arrow-right"></i>Registro de Salidas</a>
                </li>
            @endcan
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder-open"></i>
              <span>Control de Bandejas</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            @can('trays.trays_in')
              <li>
                <a href="{{url('/admin/trays_in')}}">
                  <i class="fa fa-file-text-o"></i>Préstamos</a>
              </li>
            @endcan
            @can('trays.trays_out')
              <li>
                <a href="{{url('/admin/trays_out')}}">
                  <i class="fa fa-arrow-right"></i>Registro de préstamos</a>
              </li>
              @endcan
              @can('trays.trays_return')
              <li>
              <a href="{{url('/admin/trays_return')}}">
                  <i class="fa fa-arrow-left"></i>Registro de devoluciones</a>
              </li>
              @endcan
              @can('berries.index')
              <li>
                <a href="{{url('/admin/berries')}}">
                  <i class="fa fa-code-fork"></i>Huertos Asociados</a>
              </li>
              @endcan
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user-secret"></i>
              <span>Panel de control</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            </ul>
            <ul class="treeview-menu">
            @can('users.index')
              <li>
                <a href="{{url('/admin/users')}}">
                  <i class="fa fa-users"></i>Mantenedor de Usuarios</a>
              </li>
              @endcan
            </ul>
            <ul class="treeview-menu">
            @can('configuration.index')
              <li>
                <a href="{{url('/admin/configuration')}}">
                  <i class="fa fa-gear"></i>Configuración General</a>
              </li>
              @endcan
            </ul>
          </li>
      </section>
      <!-- /.sidebar -->
    </aside>


    @yield('content')



    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b>
        1.1.0.0
      </div>
      <strong>Copyright &copy; 2018 .</strong> Todos los derechos reservados.
    </footer>

    @endguest

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/app.min.js')}}"></script>
    <script src="{{asset('js/chilean-formatter.js')}}"></script>
    <script src="{{asset('js/myjs.js')}}"></script>
    <script src="{{asset('js/mdb.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    {!!  Toastr :: render () !!} 
    <script>
      $(document).ready(function () {
        $("#btnGenerarPdf").click(function () {
          var filter = window.location.search.split('?query=')[1];
          if (filter) {
            window.open("/admin/workers/pdf" + "?filter=" + filter)
          } else {
            window.open("/admin/workers/pdf")
          }
        })

           $("#btnGenerarPdfI").click(function () {
          var filter = window.location.search.split('?query=')[1];
          if (filter) {
            window.open("/admin/inventories/pdf" + "?filter=" + filter)
          } else {
            window.open("/admin/inventories/pdf")
          }
        })

            $("#btnGenerarPdfQ").click(function () {
          var filter = window.location.search.split('?query=')[1];
          if (filter) {
            window.open("/admin/chemicals/pdf" + "?filter=" + filter)
          } else {
            window.open("/admin/chemicals/pdf")
          }
        })

        $("#btnGenerarPdfQS").click(function () {
          var filter = window.location.search.split('?query=')[1];
          if (filter) {
            window.open("/admin/chemicals/pdfs" + "?filter=" + filter)
          } else {
            window.open("/admin/chemicals/pdfs")
          }
        })

         $("#btnGenerarPdfTO").click(function () {
          var filter = window.location.search.split('?query=')[1];
          if (filter) {
            window.open("/admin/trays/pdfto" + "?filter=" + filter)
          } else {
            window.open("/admin/trays/pdfto")
          }
        })

         $("#btnGenerarPdfTR").click(function () {
          var filter = window.location.search.split('?query=')[1];
          if (filter) {
            window.open("/admin/trays/pdftr" + "?filter=" + filter)
          } else {
            window.open("/admin/trays/pdftr")
          }
        })

        $("#btnAgregarTrabajador").click(function (e) {
          $("#formAddWorkers").submit(function (e) {})
        })

        $('#category').on('change', function(){
    var valor = $(this).val();
          if(valor == 10){
            $("#sagg").removeClass("hidden");
            $("#reingresoo").removeClass("hidden");
            $("#categoriass").removeClass("hidden");

          }
          else{
            $("#sagg").addClass("hidden");
            $("#reingresoo").addClass("hidden");
            $("#categoriass").addClass("hidden");

          }
    });


      })
    </script>
  
</body>

</html>