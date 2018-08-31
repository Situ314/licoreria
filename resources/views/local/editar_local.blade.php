@extends('roles_login.SuperAdmin')

@section('cuerpo')
    <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
            <li class='title'>Locales</li>
            <li class='active'>Modificar</li>
        </ul>
    </section>
    <div id='content'>
        {!! Form::model($local, ['route' => ['Local.update',$local->CodLocal],'method'=>'put']) !!}
        @include('local.edit_formulario',['textoBotonDeFormulario'=>'Guardar Edicion'])
        {!! Form::close() !!}
    </div>
@endsection
