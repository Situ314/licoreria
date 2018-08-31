<!DOCTYPE html>
<html>
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
    {!! Html::style('web/css/owl.carousel.css') !!}
    {!! Html::style('web/css/animate.min.css') !!}
    {!! Html::style('web/css/font-awesome.min.css') !!}
    {!! Html::style('web/css/slicknav.min.css') !!}
    {!! Html::style('web/css/estilo.css') !!}
    {!! Html::style('web/css/responsive.css') !!}
    
    <script type="text/javascript" src="{{ asset('web/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/jquery.validate.min.js') }}"></script>
</head>

<body>
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
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            @if(Auth::check())
                                <a href="{{url('carrito')}}" class="cart_btn">
                                   CARRITO<i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <span class="cart_quentity">2</span>
                                </a>
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
                            <a href="{{url('index')}}"><img src="{{asset('web/img/Logo1.png')}}" alt="" height="110px"></a>
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

        <div class="welcome_area" >
            <div style="background-image: url({{asset('web/img/slider2.jpg')}});background-repeat: no-repeat;
    background-size: 100% auto;
    background-position: center top;
    background-attachment: fixed;height: 500px;padding-top: 150px;color: #000;">
                <div class="container">
                    <div class="row wow fadeInRight">
                        <div class="col-md-7 col-sm-8 ">
                            <div class="welcome_content">
                                <h2 style="color: #8A0401;">Bienvenidos a A Domicilio</h2>
                                <h1>Realiza tus pedidos desde la comodidad de tu casa.</h1>
                                <a href="{{url('pagina_menu')}}" class="custom_btn" >Ver productos y promociones</a>
                                <!--<a href="{{url('pagina_menu')}}" class="custom_btn" >Ver promociones</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--welcome area Start-->
<!--        <div class="welcome_area">
            <div class="welcome_slider">
                <div class="single_welcome_slider" style="background-image: url('http://localhost/patio/public/web/img/slider2.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-sm-8">
                                <div class="welcome_content">
                                    <span>Bienvenidos a A Domicilio</span>
                                    <h1>Realiza tus pedidos desde la comodidad de tu casa.</h1>
                                    <a href="about.html" class="custom_btn">BOOK A TABLE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single_welcome_slider" style="background-image: url('http://localhost/patio/public/web/img/slider2.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-sm-8">
                                <div class="welcome_content">
                                    <span>Bienvenidos a A Domicilio</span>
                                    <h1>Obten grandes descuentos y promociones.</h1>
                                    <a href="about.html" class="custom_btn">BOOK A TABLE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single_welcome_slider" style="background-image: url('http://localhost/patio/public/web/img/slider2.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-sm-8">
                                <div class="welcome_content">
                                    <span>Bienvenidos a A Domicilio</span>
                                    <h1>Obten grandes descuentos y promociones.</h1>
                                    <a href="about.html" class="custom_btn">BOOK A TABLE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!--welcome area end-->
    </div>
    <!--Hero area end-->

    <!--Combo_offer area start-->
    <div class="combo_offer_area">
        <div class="col-sm-6" >
            <center><h1 style="color: #8A0401;">Disfruta con amigos</h1></center><br><br>
            <p>Al compartir con amigos queremos siempre pasarla mejor de lo que esperamos y en A Domicilio buscamos hacer eso por ti de manera más rápida y sencilla. ¡LLevamos tu pedido hasta la comodidad de tu casa!.</p></br></br>
            <p>Solo debemos registrar tus datos e ingresar y puedes realizar tus pedidos de manera inmediata. O puedes descargar la aplicación desde la GooglePlay.</p>
        </div>
        <div class="col-sm-6">
            <div class="combo_img wow fadeInRight" data-wow-delay=".0s">
                <!--<img src="{{asset('web/img/cerveza.jpg')}}" width="100%" height="100%" style="background-size: cover;">-->
            </div>
        </div>
    </div>
    <!--Combo_offer area end-->
    <!--marcas area start-->
    <div>
        <div class="row" style="padding: 50px 0 100px 0;color:#8A0401;">
            <div class="col-sm-12" style="padding: 50px 120px 50px 120px;">
                <center><h1>Tenemos las mejores marcas</h1></center>
            </div>
            <div class="col-sm-12" style="text-align: center; padding-bottom: 50px;">
                <img src="{{asset('web/img/Absolut-Vodka.png')}}" width="15%" height="20%">
                <img src="{{asset('web/img/Jack_Daniels.png')}}" width="15%" height="20%">
                <img src="{{asset('web/img/JWalker.png')}}" width="15%" height="20%">
                <img src="{{asset('web/img/KOHLBERG.png')}}" width="15%" height="20%">
                <img src="{{asset('web/img/heineken.png')}}" width="15%" height="20%">
            </div>
        </div>           
    </div>
    <!--marcas area end-->
    <!--testimonial area start-->
    <div class="testimonial_area parallax">
        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-md-8  col-xs-12 text-center">
<!--                    <div class="testimonial_slider">
                        <div class="single_testimonial_slider">-->
                            <h1 style="color:#fff;">¡Descarga ya A Domicilio en tu celular!</h1>
                            <h3 style="color:#fff;">Obtener descuentos y promociones especiales descargando la aplicación desde tu celular.</h3>
                            <!--<p>Obtener descuentos y promociones especiales descargando la aplicación desde tu celular.</p>-->
                            <span class="client_name">
                                Haz tus pedidos online desde donde estes
                            </span>
                            <center><img src="{{asset('web/img/play_store.png')}}" width="30%"></center>
<!--                        </div>
                    </div>-->
                </div>
                <div class="col-md-4 col-xs-12">
                    <img src="{{asset('web/img/celular.png')}}" class="img-responsive tienda-img">
                </div>
            </div>
        </div>
    </div>
    <!--testimonial area end-->

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
    {!! Html::script('web/js/wow.min.js') !!}
    {!! Html::script('web/js/isotope.pkgd.min.js') !!}
    {!! Html::script('web/js/active.js') !!}       
</body>

</html>