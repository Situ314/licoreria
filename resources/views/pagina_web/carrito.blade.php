@extends('pagina_web.master_page')

@section('cuerpo')
<script type="text/javascript">    
    $(document).ready(function(){          
        $('#Actualizar').on('click', function() { 
            var CodProducto, Cantidad, CodPromocion, s='', Precio;
            var id = $('#id').val();
		
            $('#miTabla tbody>tr').each(function(){
                $(this).children("td").each(function (i) {
                    switch (i) {
                        case 1: CodProducto = $(this).text();
                                break;
                        case 2: CodPromocion = $(this).text();
                                break;
                        case 4: Precio = $(this).text();
                                break;
                        case 7: Cantidad = $(this).text();
                                break;
                    };
                });
                s += ' ('+CodProducto+','+id+','+Precio+','+Cantidad+','+CodPromocion+'),';
            });
            $('#Detalle').val(s.substr(0, s.length-1));
            if( $('#Detalle').val()=='' ) {
                    alert('No se han registrado los items vendidos.');
                    e.preventDefault();
            }
        });
        
//        $("#cantidad").change(function(){
//            var a= $(this).val();
//            document.getElementById("cant").innerHTML = a;
//        });  
        
        
        
        $('#enviar').on('click', function(e) {            
            var res = $("#form1").valid();
            if(!res){
                e.preventDefault();
            }
            
        });
        
        $("#form1").validate({
            rules: {
                agree: {
                    required: true
                }
            },
            messages: {
                agree: {
                    required: "Debe aceptar los terminos de la empresa. "
                }
            }
        });
        
    });
    function cambio(num) {
//        $("#cantidad"+num).change(function(){
//            var a= $(this).val();
            var a = document.getElementById("cantidad"+num).value;
            document.getElementById("cant"+num).innerHTML = a;
//        });
    }
</script> 
<!--=*=*==Single cart page area=*=*=*-->
<div class="cart_page_area sp wow fadeIn">
    <div class="container">
        <div class="cart_table_wraper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="cart_wrpaer">
                        
                        <table class="table table-striped table-responsive" style="border: 1px solid #8A0401;" id="miTabla">
                            <thead style="background-color: #8A0401;color: #fff;">
                                <tr>
                                    <th> </th>
                                    <th><span>Eliminar</span></th>
                                    <th><span class="cart_padding35">Producto</span></th>
                                    <th><span class="cart_padding35">Precio</span></th>
                                    <th class="text-center"><span>Cantidad</span></th>
                                    <th class="text-center"><span>Total</span></th>
                                </tr>
                            </thead>
                            <tbody>                            
                                <?php $num = 0; $total = 0;?>   
                                @forelse($pedidos as $pedido)                                
                                <?php $num++; ?>
                                <input type="hidden" name="id" id="id" value="{{$pedido->id}}">
                                <tr>
                                    <th scope="row"><i class="fa fa-database" aria-hidden="true"></i></th>
                                    <td class="product_img text-center">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['Temporal.destroy',$pedido->CodTemporal]]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Eliminar registro', 'onclick' => 'return confirm("¿Desea borrar este producto?");')) !!}
                                        {!! Form::close() !!}
                                    </td>                                    
                                    @if($pedido->CodPromocion == '')
                                        @foreach($productos as $producto)
                                            @if($pedido->CodProducto == $producto->CodProducto)
                                                <td style='display:none'>{{$producto->CodProducto}}</td>
                                                <td style='display:none'>NULL</td>
                                                <td class="item_name cart_padding35">{{$producto->Nombre}}</td>
                                            @endif
                                        @endforeach                                        
                                    @else
                                        @foreach($promociones as $promocion)
                                            @if($pedido->CodPromocion == $promocion->CodPromocion)
                                                <td style='display:none'>{{$promocion->CodProducto}}</td>
                                                <td style='display:none'>{{$promocion->CodPromocion}}</td>
                                                <td class="item_name cart_padding35">{{$promocion->Nombre}} </td>
                                            @endif
                                        @endforeach
                                    @endif
                                    <td style='display:none'>{{$pedido->Precio}}</td>
                                    <td class="cart_padding35">Bs. {{$pedido->Precio}}</td>
                                    <?php $total = $total + ($pedido->Precio*$pedido->Cantidad);?> 
                                    <td>
                                        <div class="cart_amount_wrap">
                                            <p class="cart_amount">
                                                <input type="number" id="<?php echo 'cantidad'.$num;?>" name="cantidad"  class="cantidad" value="{{$pedido->Cantidad}}" onclick="cambio(<?php echo $num;?>)">
                                            </p>
                                        </div>
                                    </td>
                                    <td style='display:none' id="<?php echo 'cant'.$num;?>">{{$pedido->Cantidad}}</td>
                                    <td  class="text-center">Bs. {{$pedido->Precio*$pedido->Cantidad}}</td>
                                </tr>
                                @empty
                                <p>No existen productos añadidos!</p>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-xs-6">
                                <span></span>
                            </div>
                            <div class="col-xs-6 text-right">
                                {!! Form::model(1, ['route' => ['Temporal.update',1],'method'=>'put']) !!}
                                    <input type="hidden" name="Detalle" id="Detalle">
                                    {!! Form::submit('Actualizar carrito', ['class' => 'cart_page_btn', 'id' => 'Actualizar']) !!}
                                <!--<a class="cart_page_btn2" href="{{url('actualizar_carrito')}}" id="Actualizar">Actualizar carrito</a>-->
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cart_details_area spb">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">
                <div class="total_cart">
                    <h2 style="color: #8A0401;">Total en carrito</h2>
                    <ul>
                        <li>Total<span class="total">Bs. <?php echo $total; ?></span></li>
                    </ul>
                    <a href="{{url('pedido')}}" onclick="return confirm('¿Desea enviar su pedido?')" id='enviar'>Comprar</a>
                    <div class="form-group"> 
                        <form id="form1" name="form1">
                            <center><input type="checkbox" id="agree" title="Debe aceptar los términos de la institución" name="agree" class="form-control" checked/></center>
                            <label for="agree"> Acepto que soy mayor de 18 años y libero a la empresa de toda responsabilidad.</label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--single_cart page area end-->
@endsection