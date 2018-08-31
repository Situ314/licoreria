@extends('roles_login.Admin')

@section('cuerpo')
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Productos</li>
        <li class='active'>Modificar</li>
    </ul>
</section>
<div id='content'>
    {!! Form::model($producto, ['route' => ['Producto.update',$producto->CodProducto],'method'=>'put']) !!}
    @include('producto.edit_formulario',['textoBotonDeFormulario'=>'Guardar Edicion'])
    {!! Form::close() !!}
</div>
@endsection
