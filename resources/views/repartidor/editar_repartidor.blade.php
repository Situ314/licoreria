@extends('roles_login.Admin')

@section('cuerpo')
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Repartidores</li>
        <li class='active'>Modificar</li>
    </ul>
</section>
<div id='content'>
    {!! Form::model($repartidor, ['route' => ['Repartidor.update',$repartidor->CodRepartidor],'method'=>'put']) !!}
    @include('repartidor.edit_formulario',['textoBotonDeFormulario'=>'Guardar Edicion'])
    {!! Form::close() !!}
</div>
@endsection
