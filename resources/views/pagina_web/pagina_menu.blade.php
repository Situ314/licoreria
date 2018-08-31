<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A Domicilio</title>
    <!-- === webfont=== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet"> 
    <!-- === favicon=== -->
    <link href="web/img/fevicon.png" rel="shortcut icon">
    <!-- === Bootstrap=== -->
    {!! Html::style('web/css/bootstrap.min.css') !!}
    <!--<link href="web/css/bootstrap.min.css" rel="stylesheet">-->
    <!-- === owl carousel === -->
    {!! Html::style('web/css/owl.carousel.css') !!}
    <!--<link rel="stylesheet" href="web/css/owl.carousel.css">-->
    <!-- === animate === -->
    {!! Html::style('web/css/animate.min.css') !!}
    <!--<link rel="stylesheet" href="web/css/animate.min.css">-->
    <!-- === font awesome === -->
    {!! Html::style('web/css/font-awesome.min.css') !!}
    <!--<link rel="stylesheet" href="web/css/font-awesome.min.css">-->
    <!-- === slick nav === -->
    {!! Html::style('web/css/slicknav.min.css') !!}
    <!--<link rel="stylesheet" href="web/css/slicknav.min.css">-->
    <!-- === Main css === -->
    {!! Html::style('web/css/estilo.css') !!}
    <!--<link rel="stylesheet" href="web/css/custom/style.css">-->
    <!-- === responsive css === -->
    {!! Html::style('web/css/responsive.css') !!}
    <!--<link rel="stylesheet" href="web/css/responsive.css">-->
    
    <script type="text/javascript" src="{{ asset('web/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/jquery.validate.min.js') }}"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    
    <script type="text/javascript">
        $(document).ready(function() {
            if($("#dato").val() == 'categorias'){
                document.getElementById('categorias').scrollIntoView();
            }else if($("#dato").val() == 'promociones'){
                document.getElementById('promociones').scrollIntoView();
            }
        });
    </script>
</head>
<body>
    <input type="hidden" id="dato" value="{{$dato}}">
    <!--preloader area Start-->
    <div class="preloader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
    <!--preloader area end-->
    <!--Hero area Start-->
    <div class="hero_area">
        <!--header area Start-->
        <header>
            <div class="header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="header_contact">
                                <i class="fa fa-phone" aria-hidden="true"></i> +541 4584756
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>licoreria@gmail.com
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <span class="header_time">
                               HORARIO DE ATENCION : LUNES - VIERNES  | 9 AM - 10 PM
                            </span>&nbsp;&nbsp;&nbsp;
                            @if(auth()->check() && auth()->user()->CodGrupo == '1')
                                <a href="{{url('carrito')}}" class="cart_btn">
                                   Ver carrito<i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <span class="cart_quentity">+</span>
                                </a>
                                <div style="text-align: right;">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                  <i class="fa fa-sign-out" style="font-size:25px;color: #000;">Salir</i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            @elseif(auth()->check() && auth()->user()->CodGrupo == '3')
                                <div style="text-align: right;">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" style="font-size:25px;color: #000;">Salir</i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            @else
                                <a href="{{url('login_web')}}" class="custom_btn" style="padding: 5px 0 5px 0;margin: 0;">Ingresar</a>                            
                                <a href="{{url('registro')}}" class="custom_btn" style="padding: 5px 0 5px 0;margin: 0;">Registrate!</a>                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <nav class="menu_bar">
                                <ul class="main_menu">
                                    <li><a href="{{url('index')}}">INICIO</a></li>
                                    <li><a href="#">SOBRE NOSOTROS</a></li>
                                    <li><a href="{{url('productos/0')}}">CATEGORIAS</a></li>
                                    <li><a href="{{url('promociones/promociones')}}">PROMOCIONES</a></li>
                                    <li><a href="#">CONTÁCTANOS</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{url('productos/0')}}"><img src="{{asset('web/img/Logo1.png')}}" alt="" height="110px"></a>
                        </div>
<!--                        <div class="col-sm-3">
                            <form action="#" class="search_bar">
                                <input type="text" placeholder="Buscar...">
                                <a href="#" class="search_btn"><i class="fa fa-search" aria-hidden="true"></i> </a>
                            </form>
                        </div>-->
                    </div>
                </div>
            </div>
        </header>
        <!--header area end-->
    </div>
    <!--hero area end-->
    <!--tittle_area start-->
    <div class="tittle_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="tittle_content">
                        <h1>Licoreria</h1>
                        <h1> ADomicilio</h1>
                        <span></span>
                        <span><a href="{{url('productos/0')}}" class="btn btn-danger">Ver productos</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--tittle_area end-->
    <!--special_food area start-->
    <div class="special_food_area" id="promociones" style="padding-top: 50px;padding-bottom: -30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_tittle">
                        <i class="icon" style="background-image:url(img/tittle_icon.png)"></i>
                        <div class="section_tittle_content">
                            <h1 style="color: #8A0401;">PROMOCIONES</h1>
                            <span>Revisa nuestras promciones disponibles y obten grandes descuentos.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!--<div class="single_chef_slider">-->
                        @forelse($promociones as $promocion)
                        <div class="col-md-3"> 
                            <a href="{{route('ver_promocion', $promocion->CodPromocion)}}"><img src="{{asset('imagenes/1/promociones/'.$promocion->Foto.'')}}"></a>
                            <div class="special_content">
                                <h4 style="color: #8A0401;"><center>{{$promocion->Nombre}}</center></h4>
                                <p>{{$promocion->Descripcion}}</p>
                                <span><b>Descuento: {{$promocion->Descuento}} %</b></span>
                            </div>
                        </div>
                        @empty
                        <p>No tenemos promociones activas por el momento.</p>
                        @endforelse
                    <!--</div>-->
                </div>
            </div>
            <!--pagination area start-->
            <div class="pagination_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="paginations" >
                                {{$promociones->links()}} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--special_food area end-->
    
    <!--our_menu area start-->
    <div class="food_menu_page parallax" id="categorias" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="our_menu_tabs">
                        <li class="active" data-name="todos">
                            <a href="{{route('productos', 0)}}">
                                <div class="icon_wraper">
                                    <span class="icon" style="background-image:url({{asset('web/img/food_menu1.png')}})"></span>
                                    <span class="hover_icon" style="background-image:url({{asset('web/img/menu_h_icon4.png')}})"></span>
                                </div>
                                TODOS
                            </a>
                        </li>
                        @forelse($cat_productos as $cat_producto)  
                        <li data-name="">
                            <a href="{{route('productos', $cat_producto->CodCategoriaP)}}">
                                <div class="icon_wraper">
                                    <span class="icon" style="background-image:url({{asset('web/img/food_menu4.png')}})"></span>
                                    <span class="hover_icon" style="background-image:url({{asset('web/img/menu_h_icon4.png')}})"></span>
                                </div>
                                {{strtoupper($cat_producto->Nombre)}}
                            </a>
                        </li>
                        @empty
                        <p>No existen categorias de productos registrados!</p>
                        @endforelse
                    </ul>
                </div>
                <div class="col-sm-12">
                    <div class="row isotope">                       
                        @yield('cuerpo')
<!--                    </div>
                </div>
            </div>
        </div>
    </div>
    our_menu area end       
        pagination area start
        <div class="pagination_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="paginations">
                            <a class="prev" href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a class="next active" href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!--pagination area end-->
        
        <!--footer area start-->
    <footer>
        <div class="footer_top_area">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-sm-3">
                        <h4 class="footer_tittle">Sobre nosostros</h4>
                        <div class="footer_content">
                            <p>Somos una empresa dedicada al delivery de bebidas a elección del cliente.</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="footer_tittle">Contáctanos</h4>
                        <div class="footer_contact">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>2923 Sopocachi La Paz, Bolivia
                            <i class="fa fa-phone" aria-hidden="true"></i>+541 73843777
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>licoreria@gmail.com
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="footer_tittle">Suscríbete ahora!!</h4>
                        <form action="#" class="footer_subscribe">
                            <input type="text" placeholder="Ir al formulario de registro" disabled>
                            <a href="{{url('registro')}}"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
    {!! Html::script('web/js/bootstrap.min.js') !!}
    {!! Html::script('web/js/owl.carousel.min.js') !!}
    {!! Html::script('web/js/jquery.slicknav.min.js') !!}
    <!--<script src="web/js/wow.min.js"></script>-->
    {!! Html::script('web/js/isotope.pkgd.min.js') !!}
    {!! Html::script('web/js/active.js') !!}        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    @include('sweet::alert')  
</body>

</html>
