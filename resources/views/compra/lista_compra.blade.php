@extends('roles_login.Admin')
<div>
@section('cuerpo')
<head>
    <style>
        th:last-child, td:last-child {
          width: 13%;
        }
    </style>
</head>
<!-- Page Header -->
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
      <li class='title'>Compras realizadas</li>
    </ul>
</section>
<div id='content'>
    <div class="form-group add">
        <div class="col-lg-2">
            <a href="{{url('/Compra/create')}}" class="btn btn-success" title=" Adicionar nuevo "/>+</a>
        </div>
        <div class="col-lg-offset-8 col-lg-2">
            {!! Form::open(['method' => 'GET', 'url' => 'compras', 'class' => 'navbar-form navbar-left', 'role' => 'search'])!!}
            <div class="input-group custom-search-form">
                <input type="text" name="search" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default-sm">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>  
            {!! Form::close()!!}
        </div>
    </div>  
    <div>    
        <table border="1" class="table table-bordered table-hover table-responsive" id="mi-tabla" style="border-color: #8A0401;">
            <thead style="background-color: #8A0401;color: #fff;">
                <tr> 
                    <th> Número </th> 
                    <th> Fecha </th>
                    <th> Total </th>
                    <th> Acción </th> 
                </tr> 
            </thead>
            <tbody>
                @forelse($compras as $compra) 
                    <tr>
                        <td> {{$compra->Numero}} </td>  
                        <td>{{FechaDeMySQL($compra->Fecha)}}</td>               
                        <td> {{$compra->Total}} </td>    
                        <td style="text-align: center;">
                            <div style="display: inline-block;">
                                <acronym title=" Modificar registro ">
                                    <a href="{{route('Compra.edit', $compra->CodCompra)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                </acronym>
                            </div>
                            <div style="display: inline-block;">
                                <acronym title=" Eliminar registro ">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['Compra.destroy',$compra->CodCompra]]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Eliminar registro', 'onclick' => 'return confirm("Está seguro que quiere borrar este registro?");')) !!}
                                    {!! Form::close() !!}
                                </acronym>
                            </div>
                        </td> 
                    </tr>
                @empty
                <p>No existen compras registradas!</p>
                @endforelse 
            </tbody>         
        </table>
    </div>
    <div class="row">
        {{$compras->links()}} 
    </div>
</div>
@endsection
