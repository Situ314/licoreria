<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patio de comidas</title>
    {!! Html::style('css/application-a07755f5.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/style.css') !!}
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>
      <a class='navbar-brand' href='#'>
        <i class='icon-beer'></i>
        Hierapolis
      </a>
      <ul class='nav navbar-nav pull-right'>
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-user'></i>
            <strong>John DOE</strong>
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href='#'>Cambiar contraseña</a>
            </li>
            <li class='divider'></li>
            <li>
              <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Salir
                </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div id='wrapper'>
        <!-- Sidebar -->
        <section id='sidebar'>
            <i class='icon-align-justify icon-large' id='toggle'></i>
            <ul id='dock'>
                <li class='launcher'>
                    <i class='fa fa-motorcycle'></i>
                    <a href='{{url('/Repartidor')}}'>Repartidores</a>
                </li>
                <li class='launcher'>
                    <i class='fa fa-share-square-o'></i>
                    <a href='{{url('/Despachador')}}'>Despachadores</a>
                </li>
                <li class='launcher'>
                    <i class='fa fa-cubes'></i>
                    <a href='{{url('/CategoriaProducto')}}'>Categoria Productos</a>
                </li>
                <li class='launcher'>
                    <i class='fa fa-cube'></i>
                    <a href='{{url('/Producto')}}'>Productos</a>
                </li> 
                <li class='launcher'>
                    <i class='fa fa-gift'></i>
                    <a href='{{url('/Promocion')}}'>Promociones</a>
                </li> 
                <li class='launcher'>
                    <i class='fa fa-cart-plus'></i>
                    <a href='{{url('/Compra')}}'>Compras</a>
                </li> 
                <li class='launcher'>
                    <i class='fa fa-handshake-o'></i>
                    <a href='#'>Pedidos</a>
                </li> 
                <li class='launcher'>
                    <i class='fa fa-file-pdf-o'></i>
                    <a href="tables.html">Reportes</a>
                </li>  
            </ul>
        </section>
        <!-- Tools -->
<!--        <section id='tools'>
            <ul class='breadcrumb' id='breadcrumb'>
                <li class='title'>Forms</li>
                <li><a href="#">Lorem</a></li>
                <li class='active'><a href="#">ipsum</a></li>
            </ul>
        </section>
         Content 
        <div id='content'>
           Content 
            @yield('cuerpo')-->
        <!--</div>-->
        <div>
            @yield('cuerpo')
        </div>
    </div>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <!--{!! Html::script('js/jquery-3.2.1.min.js') !!}-->
    {!! Html::script('js/bootstrap.min.js') !!}
    
  </body>    
</html>
