@extends('roles_login.Admin')

@section('cuerpo')
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
      <li class='title'>Promocion</li>
    </ul>
</section>
<div id='content'>
    <div class="form-group add">
        <div class="col-lg-2">
            <a href="{{url('/Promocion/create')}}" class="btn btn-success" title=" Adicionar nuevo "/>+</a>
        </div>
        <div class="col-lg-offset-8">
            {!! Form::open(['method' => 'GET', 'url' => 'promociones', 'class' => 'navbar-form navbar-left', 'role' => 'search'])!!}
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
                    <th> Nombre </th>   
                    <th> Acción </th>
                </tr> 
            </thead>
            <tbody>
                @forelse($promociones as $promocion)            
                <tr>
                    <td>{{$promocion->Nombre}}</td>
                    <td style="text-align: center;">
                        <div style="display: inline-block;">
                            <a href="{{route('Promocion.edit', $promocion->CodPromocion)}}" title="Ver registro" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                         
                        </div>
                        <div style="display: inline-block;">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['Promocion.destroy',$promocion->CodPromocion]]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Eliminar registro', 'onclick' => 'return confirm("Está seguro que quiere borrar este registro?");')) !!}
                            {!! Form::close() !!} 
                        </div>      
                    </td>  
                </tr>
                @empty
                <p>No existen promociones registradas!</p>
                @endforelse
            </tbody>            
        </table>
    </div>
    <div class="row">
        {{$promociones->links()}} 
    </div>
</div>
@endsection