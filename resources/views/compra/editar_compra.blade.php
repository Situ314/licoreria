@extends('roles_login.Admin')

@section('cuerpo')
<!-- Page Header -->
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Compra</li>
        <li class='active'>Modificar</li>
    </ul>
</section>
<!--End Page Header -->
<div id='content'>
{!! Form::model($compra,['route' => ['Compra.update',$compra->id],'method'=>'put']) !!}
@include('compra.edit_formulario1',['textoBotonDeFormulario'=>'Guardar Edicion'])
{!! Form::close() !!}
</div>
@endsection