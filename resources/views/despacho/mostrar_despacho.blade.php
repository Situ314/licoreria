@extends('roles_login.Admin')
<!--<div style="text-align: right;">-->
@section('cuerpo')
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Pedidos</li>
        <li class='active'>Ver</li>
    </ul>
</section>
<div id='content'>
    
    <div id="contenedro_general" class="row">
        <div class="col-md-6">            
            <div class="col-md-12">
                <center><h3 style="color: #8A0401"><b> Datos de pedido</b></h3></center>                
                <div class="form-group">
                    {!! Form::label('Despachador','Despachador:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-8">
                        @foreach($usuarios as $usuario)
                            @if($despacho->CodDespachador == $usuario->id)
                                <input type="text" name="Repartidor" class="form-control" value="{{$usuario->Nombre}}" disabled>
                            @endif
                        @endforeach
                    </div>                  
                </div>
                <div class="form-group">
                    {!! Form::label('Repartidor','Repartidor:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-8">
                        @foreach($usuarios as $usuario)
                            @if($despacho->CodRepartidor == $usuario->id)
                                <input type="text" name="Repartidor" class="form-control" value="{{$usuario->Nombre}}" disabled>
                            @endif
                        @endforeach
                    </div>                  
                </div>
                <div class="form-group">
                    {!! Form::label('Fecha','Fecha:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-8">
                        <input type="text" name="Fecha" class="form-control" value="{{$despacho->created_at->format('d-m-Y')}}" disabled>
                    </div>                  
                </div>
                <div class="form-group">
                    {!! Form::label('HoraD','Hora de despacho:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-8">
                        <input type="text" name="HoraD" class="form-control" value="{{$despacho->created_at->toTimeString()}}" disabled>
                    </div>                  
                </div>
                <div class="form-group">
                    {!! Form::label('HoraP','Hora de pedido:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-8">
                        <input type="text" name="HoraP" class="form-control" value="{{$despacho->updated_at->toTimeString()}}" disabled>
                    </div>                  
                </div>
                <div class="form-group">
                    {!! Form::label('Estado','Estado:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-8">
                        @foreach($estados as $estado)
                            @if($despacho->CodEstado == $estado->CodEstado)
                                <input type="text" name="Estado" class="form-control" value="{{$estado->Nombre}}" disabled>
                            @endif
                        @endforeach                        
                    </div>                  
                </div>
                                  
            </div>
        </div>
        <div  class="col-md-6">
            <div class="col-md-12">
                <center><h3 style="color: #8A0401"><b> Datos de entrega</b></h3></center>                
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
                <div class="clearfix">&nbsp;</div>
                <center><h3 style="color: #8A0401"><b> Datos de factura</b></h3></center>  
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
    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
    <div id="footer" class="row" style="text-align: center">
        <a href="{{route('Despacho.index')}}" class="btn btn-danger">Volver</a>
    </div>

</div>
@endsection
<!--</div>-->
