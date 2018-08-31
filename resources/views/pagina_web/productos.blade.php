@extends('pagina_web.pagina_menu')

@section('cuerpo')
<script type="text/javascript">
        $(document).ready(function() {
            if($("#dato").val() == 'categorias'){
                document.getElementById('categorias').scrollIntoView();
            }else if($("#dato").val() == 'promociones'){
                document.getElementById('promociones').scrollIntoView();
            }
        });
    </script>


    <input type="hidden" id="dato" value="{{$dato}}">
    @forelse($productos as $producto) 
    <div class="single_menu col-md-4 col-sm-6 todos wow fadeIn" data-wow-delay="0.2s" id="promociones">                            
        <!--<div class="food_menu_img" style="background-image:url({{asset('web/img/single_food1.jpg')}})">-->
        <div class="food_menu_img">
            <a href="{{route('ver_producto', $producto->CodProducto)}}"><img src="{{asset('imagenes/1/productos/'.$producto->Foto.'')}}"></a>
        </div>
        <div class="menu_content">
            <a href="{{route('ver_producto', $producto->CodProducto)}}"><h5>{{$producto->Nombre}}</h5></a>
            <p>{{$producto->Tamaño}}</p>
            <span>Precio: Bs. {{$producto->Precio}}</span>
        </div>                            
    </div>
    @empty
    <p>No existen productos registrados!</p>
    @endforelse
    
    <!--Terminar menu para paginacion-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--our_menu area end-->       
        <!--pagination area start-->
        <div class="pagination_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="paginations">
                            {{$productos->links()}} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection