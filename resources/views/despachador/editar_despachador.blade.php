@extends('roles_login.Admin')

@section('cuerpo')
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Despachadores</li>
        <li class='active'>Modificar</li>
    </ul>
</section>
<div id='content'>
    {!! Form::model($despachador, ['route' => ['Despachador.update',$despachador->CodDespachador],'method'=>'put']) !!}
    @include('despachador.edit_formulario',['textoBotonDeFormulario'=>'Guardar Edicion'])
    {!! Form::close() !!}
</div>
@endsection
