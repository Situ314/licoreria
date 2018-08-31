@extends('master')

@section('cuerpo')
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Clientes</li>
        <li class='active'>Modificar</li>
    </ul>
</section>
<div id='content'>
    {!! Form::model($cliente, ['route' => ['Cliente.update',$cliente->CodCliente],'method'=>'put']) !!}
    @include('cliente.edit_formulario',['textoBotonDeFormulario'=>'Guardar Edicion'])
    {!! Form::close() !!}
</div>
@endsection
