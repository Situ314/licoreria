@extends('pagina_web.master_page')

@section('cuerpo')
<!--our_menu area start-->
<div class="cart_page_area sp wow fadeIn">
    <div class="container">
        <div class="cart_table_wraper">
            <h2 style="color: #8A0401;">PEDIDOS PENDIENTES</h2>
            <div class="row">
                <div class="col-sm-12">
                    <div class="cart_wrpaer">                        
                        <table class="table table-striped table-responsive" style="border: 1px solid #B5504E;">
                            <thead style="background-color: #8A0401;color: #fff;">
                                <tr>
                                    <th>Número</th>
                                    <th>Cliente</th>                                    
                                    <th>Fecha/Hora</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pedidos as $pedido)
                                <tr>
                                    <td>{{$pedido->Numero}}</td>
                                    @foreach($clientes as $cliente)
                                        @if($pedido->CodCliente == $cliente->id)
                                            <td>{{$cliente->Nombre}}</td>
                                        @endif
                                    @endforeach                                    
                                    <td>{{$pedido->FechaHora}}</td>
                                    <td><a href="{{route('Pedido.edit', $pedido->CodPedido)}}" class="custom_btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ver detalle</a></td>
                                </tr>
                                @empty
                                <p>No existen pedidos pendientes!</p>
                                @endforelse
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--our_menu area end-->
@endsection