<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bootflat-Admin Template</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="dist/js/site.min.js"></script>
    @livewireStyles
  </head>
  <body>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">{{$local->local}}</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">{{Auth::user()->name}} <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">Configuracion</li>
                  <li><a href="{{route('logout')}}">Cerrar Sesion</a></li>
                </ul>
              </li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>MENU</b></li>
                <li class="list-group-item"><a href="index.html"><i class="glyphicon glyphicon-home"></i>Inicio </a></li>
                <li>
                  <a href="#demo3" class="list-group-item " data-toggle="collapse">Configuraciones  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="demo3">
                    <a href="javascript:;" class="list-group-item">Usuarios</a>
                    <a href="{{route('locales')}}" class="list-group-item">Locales</a>
                  </div>
                </li>


                <li>
                  <a href="#demo2" class="list-group-item " data-toggle="collapse">Productos  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="demo2">
                    <a href="{{route('categorias')}}" class="list-group-item">Categorias</a>
                    <a href="{{route('productos')}}" class="list-group-item">Productos</a>
                  </div>
                </li>

                <li>
                  <a href="#demo1" class="list-group-item " data-toggle="collapse">Inventario  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="demo1">
                    <a href="{{route('gestiones')}}" class="list-group-item">Movimiento de Inventario</a>
                    @if(Auth::user()->tipo_usuario == 1)
                    <a href="{{route('auditorias')}}" class="list-group-item">Auditorias</a>
                    <a href="{{route('inventario_completo')}}" class="list-group-item">Inventario Completo</a>
                    @endif
                  </div>
                </li>



                <li>
                  <a href="#demo1" class="list-group-item " data-toggle="collapse">Ventas  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="demo1">
                    <a href="{{route('ventas_restaurante')}}" class="list-group-item">Restaurante</a>
                    @if(Auth::user()->tipo_usuario == 1)
                    <a href="{{route('auditorias')}}" class="list-group-item">Auditorias</a>
                    <a href="{{route('inventario_completo')}}" class="list-group-item">Inventario Completo</a>
                    @endif
                  </div>
                </li>
              </ul>
          </div>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading d-flex justify-content-between align-items-center">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel">
                    </span></a> @yield('titulo')</h3>
              </div>
              <div class="panel-body">
                @yield('contenido')
              </div><!-- panel body -->
            </div>
        </div><!-- content -->
      </div>
    </div>
    @livewireScripts
  </body>
</html>