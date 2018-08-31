<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patio de comidas</title>
    {!! Html::style('css/application-a07755f5.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/datepicker.css') !!}
    {!! Html::style('css/style.css') !!}
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="{{ asset('web/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/jquery.validate.min.js') }}"></script>
    
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
            <strong>{{ Auth::user()->username }}</strong>
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
                    <i class='icon-dashboard'></i>
                    <a href="{{url('/Local')}}">Locales</a>
                </li>
                <li class='active launcher'>
                    <i class='icon-file-text-alt'></i>
                    <a href="{{url('/CategoriaLocal')}}">Categoria locales</a>
                </li>                  
                <li class='launcher'>
                    <i class='icon-table'></i>
                    <a href="tables.html">Reportes</a>
                </li>              
                <li class='launcher dropdown hover'>
                    <i class='icon-flag'></i>
                    <a href='#'>Reports</a>
                    <ul class='dropdown-menu'>
                      <li class='dropdown-header'>Launcher description</li>
                      <li>
                        <a href='#'>Action</a>
                      </li>
                      <li>
                        <a href='#'>Another action</a>
                      </li>
                      <li>
                        <a href='#'>Something else here</a>
                      </li>
                    </ul>
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
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/bootstrap-datepicker.js') !!}
  </body>    
</html>
