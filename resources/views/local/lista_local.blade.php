@extends('roles_login.SuperAdmin')

@section('cuerpo')
<!-- Content -->
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
      <li class='title'>Locales</li>
    </ul>
</section>
<div id='content'>  
    <div class="form-group add">
        <div class="col-lg-2">
            <acronym title=" Adicionar nuevo ">
                <a href="{{url('/Local/create')}}" class="btn btn-success" />+</a>
            </acronym>
        </div>
        <div class="col-lg-offset-8">
            {!! Form::open(['method' => 'GET', 'url' => 'locales', 'class' => 'navbar-form navbar-left', 'role' => 'search'])!!}
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
        <table border="1" class="table table-bordered table-hover table-responsive" id="mi-tabla" style="background-color:red;">
            <thead style="background-color:red;color:white;">
            <tr> 
                <th> Nombre </th>   
                <th> Acción </th>
            </tr> 
            </thead>
            <tbody>
                @forelse($locales as $local)            
                <tr>
                    <td>{{$local->Nombre}}</td>
                    <td style="text-align: center;">
                        <div  class="row" style="display: inline-block; text-align: center;">
                            <div style="display: inline-block; text-align: center;">
                                <a href="{{route('Local.edit', $local->CodLocal)}}" class="btn btn-primary" title="Ver registro"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                               
                            </div>
                            <div style="display: inline-block; text-align: center;">                                
                                {!! Form::open(['method' => 'DELETE', 'route' => ['Local.destroy',$local->CodLocal]]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Eliminar registro', 'onclick' => 'return confirm("Está seguro que quiere borrar este registro?");')) !!}
                                {!! Form::close() !!} 
                            </div>                     
                        </div>
                    </td>  
                </tr>
                @empty
                <p>No existen locales registrados!</p>
                @endforelse
            </tbody>            
        </table>
    </div>
    <div class="row">
        {{$locales->links()}} 
    </div>
</div>
@endsection
