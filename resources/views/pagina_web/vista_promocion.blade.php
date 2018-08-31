@extends('pagina_web.master_page')

@section('cuerpo')
<!--=*=*==Single shop page area=*=*=*-->
<div class="single_shop_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{asset('imagenes/1/promociones/'.$promocion->Foto.'')}}">
            </div>
            <div class="col-sm-6">
                <div class="single_shop_content">
                    <h4>{{$promocion->Nombre}}</h4>
                    <p>{{$promocion->Descripcion}}</p>
                    <span class="price">
                        <?php $descuento = ($promocion->Descuento*$producto->Precio)/100;?>
                    <div class="item_name">
                        <span>Producto:</span> {{$producto->Nombre}}
                    </div>
                        Precio: Antes Bs. {{$producto->Precio}} <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Ahora Bs.<?php echo $producto->Precio-$descuento;?>
                    </span>
                    <div class="item_name">
                        <span>Descuento:</span> {{$promocion->Descuento}} %
                    </div>
                    {!! Form::open(['method' => 'POST','route' => 'Temporal.store'])!!}
                    <div class="cart_quintity">
                        <input type="hidden" name="precio" value="<?php echo $producto->Precio-$descuento;?>">
                        <input type="number" name="cantidad" value="1" class="cantidad">
                        <input type="hidden" name="CodPromocion" value="{{$promocion->CodPromocion}}">
                        <input type="hidden" name="CodProducto" value="{{$producto->CodProducto}}">
                        <input type="hidden" name="producto" value="promocion">
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
        <span>Promoción valida del {{FechaDeMySQL($promocion->Desde)}} hasta {{FechaDeMySQL($promocion->Hasta)}}.</span>
    </div>
</div>
<!--single_shop page area end-->
@endsection