@extends('roles_login.Admin')
@section('cuerpo')
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Compra</li>
        <li class='active'>Nueva</li>
    </ul>
</section>
<div id='content'>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['method' => 'POST','route' => 'Compra.store'])!!}
    @include('compra.formulario_compra', ['textoBotonDeFormulario' => 'Guardar Nuevo'])
    {!! Form::close()!!}
</div>
@endsection