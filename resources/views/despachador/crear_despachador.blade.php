@extends('roles_login.Admin')
<div style="align-content: center;">
@section('cuerpo')
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Despachadores</li>
        <li class='active'>Nuevo</li>
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

{!! Form::open(['method' => 'POST','route' => 'Despachador.store'])!!}
@include('despachador.formulario_despachador', ['textoBotonDeFormulario' => 'Guardar Nuevo'])
{!! Form::close()!!}
</div>
@endsection
</div>

