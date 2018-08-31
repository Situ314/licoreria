<!--=*=*==Single cart page area=*=*=*-->
<div class="cart_page_area sp wow fadeIn">
    <div class="container">
        <div class="cart_table_wraper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="cart_wrpaer">
                        <table class="table table-striped table-responsive" style="border: 1px solid #8A0401;">
                            <thead style="background-color: #8A0401;color: #fff;">
                                <tr>
                                    <th> </th>
                                    <th><span class="cart_padding35">Producto</span></th>
                                    <th><span class="cart_padding35">Precio</span></th>
                                    <th class="text-center"><span>Cantidad</span></th>
                                    <th class="text-center"><span>Total</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0;?>
                                @forelse($detalles as $detalle)
                                <tr>
                                    <th scope="row"><i class="fa fa-database" aria-hidden="true"></i></th>
                                    @foreach($productos as $producto)
                                        @if($detalle->CodProducto == $producto->CodProducto)
                                            <td class="item_name cart_padding35">{{$producto->Nombre}}</td>
                                        @endif
                                    @endforeach
                                    <td class="cart_padding35">Bs. {{$detalle->Precio}}</td>
                                    <td>{{$detalle->Cantidad}}</td>
                                    <td  class="text-center">Bs. {{$detalle->Precio*$detalle->Cantidad}}</td>
                                    <?php $total = $total + $detalle->Precio*$detalle->Cantidad;?>
                                </tr>      
                                @empty
                                <p>No existen productos registrados!</p>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td><td></td><td></td>
                                    <td><b>Total</b></td>
                                    <td><b><center>Bs. <?php echo $total;?></center></b></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-inline">
                                    Asignar repartidor
                                    <select id="Repartidor" name="Repartidor" class="form-control">
                                        <option value="" disabled selected>--Escoja un repartidor--</option>
                                        @foreach($repartidores as $repartidor)
                                        <option value="{{$repartidor->id}}">{{$repartidor->Nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 text-right">
                                {!! Form::submit($textoBotonDeFormulario, ['class' => 'custom_btn']) !!}
                                {!! Form::close()!!}  
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="col-md-5 col-md-offset-1">
                            <center><h3 style="color: #8A0401;"><b>Datos de pedido</b></h3></center>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('Cliente','Cliente:', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    @foreach($usuarios as $usuario)
                                        @if($pedido->CodCliente == $usuario->id)
                                            <input type="text" name="Cliente" class="form-control" value="{{$usuario->Nombre}}" disabled>
                                        @endif
                                    @endforeach                           
                                </div>                   
                            </div>
                            <div class="form-group">
                                {!! Form::label('Zona','Zona:', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    <input type="text" name="Zona" class="form-control" value="{{$pedido->Zona}}" disabled>
                                </div>                   
                            </div>
                            <div class="form-group">
                                {!! Form::label('Direccion','Dirección:', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    <input type="text" name="Direccion" class="form-control" value="{{$pedido->Direccion}}" disabled>
                                </div>                   
                            </div>                            
                        </div>
                        <div class="col-md-5">
                            <center><h3 style="color: #8A0401"><b> Datos de factura</b></h3></center>
                            <div class="clearfix">&nbsp;</div>
                            <div class="form-group">
                                {!! Form::label('NIT','NIT:', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    <input type="text" name="NIT" class="form-control" value="{{$pedido->NIT}}" disabled>
                                </div>                   
                            </div>
                            <div class="form-group">
                                {!! Form::label('Factura','Factura:', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    <input type="text" name="Factura" class="form-control" value="{{$pedido->NombreFactura}}" disabled>
                                </div>                   
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--single_cart page area end-->
