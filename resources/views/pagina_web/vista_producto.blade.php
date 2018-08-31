@extends('pagina_web.master_page')

@section('cuerpo')
<!--<script type="text/javascript">
$(document).ready(function() {
    $("#Formulario").validate({	
        errorClass:'bg-danger',
        onkeyup: false,
        rules: {
            cantidad: {
		max : $max_cantidad
            }
        },
        messages: {
            cantidad:{
                max: 'Solo existe un máximo de '.$max_cantidad.' de este producto.'
            }
        }
    });
});
</script>-->
<!--=*=*==Single shop page area=*=*=*-->
<div class="single_shop_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{asset('imagenes/1/productos/'.$producto->Foto.'')}}">
            </div>
            <div class="col-sm-6">
                <div class="single_shop_content">
                    <h4>{{$producto->Nombre}}</h4>
                    <p>{{$producto->Descripcion}}</p>
                    <span class="price">
                   Precio: Bs. {{$producto->Precio}}
                   </span>
                    <div class="item_name">
                        <span>Tamaño:</span> {{$producto->Tamaño}}
                    </div>
                    {!! Form::open(['method' => 'POST','route' => 'Temporal.store', 'id' => 'Formulario'])!!}
                    <div class="cart_quintity">
                        <input type="hidden" name="precio" value="{{$producto->Precio}}">
                        <input type="number" name="cantidad" value="1" class="cantidad" >
                        <input type="hidden" name="CodProducto" value="{{$producto->CodProducto}}">
                        <input type="hidden" name="producto" value="regular">
                        <!--Vuelta a categorias con pedido guardado-->
                        @if(auth()->check() && auth()->user()->CodGrupo == '1')
                            {!! Form::submit('Añadir al carrito', ['class' => 'custom_btn']) !!}
                        @elseif(auth()->check() && auth()->user()->CodGrupo != '1')
                            <span></span>
                        @else
                            <a href="{{url('login_web')}}" class="custom_btn" placeholder="Debe ingresar para poder añadir a carrito" disabled onclick='return confirm("Debe ingresar para poder añadir a carrito");'>Añadir al carrito</a>
                        @endif
                    </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
<!--single_shop page area end-->
@endsection