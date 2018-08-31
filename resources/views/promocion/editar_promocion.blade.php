@extends('roles_login.Admin')

@section('cuerpo')
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Promoción</li>
        <li class='active'>Modificar</li>
    </ul>
</section>
<div id='content'>
    {!! Form::model($promocion, ['route' => ['Promocion.update',$promocion->CodPromocion],'method'=>'put']) !!}
    @include('promocion.edit_formulario',['textoBotonDeFormulario'=>'Guardar Edicion'])
    {!! Form::close() !!}
</div>
@endsection
