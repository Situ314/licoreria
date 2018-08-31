@extends('pagina_web.master_page')

@section('cuerpo')
    {!! Form::model($pedido, ['route' => ['Pedido.update',$pedido->CodPedido],'method'=>'put']) !!}
    @include('pagina_web.repartidor.edit_formulario',['textoBotonDeFormulario'=>'Despachar'])
    {!! Form::close() !!}
@endsection
