@extends('roles_login.Admin')

@section('cuerpo')
 
<head>
    <script type="text/javascript">
        
        function editar(cont) {
            document.getElementById('nombre'+cont).style.display = 'none'; 
            document.getElementById('editar'+cont).style.display = 'block'; 
            document.getElementById('boton'+cont).style.display = 'block'; 
        }
    </script>
</head>
<style>
    /*nueva categoria producto*/
    input[type="checkbox"] + label {
        background: #54BD58;
        border-radius: 5px;
        color: #fff;
        padding: 5px 15px; 
    }    
    #activar ~ .desplegable {
        display: none;
        overflow: hidden;
    } 
    #activar:checked ~ .desplegable {
        display: block;
    }
    /*editar registro*/
    .nombre {
        display: block;
    }
    .editar, .boton {
        display: none;
        overflow: hidden;
    }
</style>
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
      <li class='title'>Categoria de productos</li>
    </ul>
</section>
<div id='content'> 
    <div class="col-lg-12">
        <div class="col-lg-offset-8">
            {!! Form::open(['method' => 'GET', 'url' => 'categoria_productos', 'class' => 'navbar-form navbar-left', 'role' => 'search'])!!}
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
    <input type="checkbox" id="activar" name="activar" hidden>
    <label for="activar">+</label>
    <div class="desplegable">
        {!! Form::open(['method' => 'POST','route' => 'CategoriaProducto.store'])!!}
        <div class="col-lg-7 col-lg-offset-2">                  
            <div class="form-group">
                {!! Form::label('Nombre','Nombre de la categoria:', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-8">
                    {!! Form::text('Nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingresar el nombre de la categoria']) !!}
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <div class="row col-lg-offset-6">
                    {!! Form::submit('Guardar Nuevo', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
        {!! Form::close()!!}
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
                <?php $cont = 0; ?>
                @forelse($categoria_productos as $categoria_producto)            
                <tr>
                    {!! Form::model($categoria_producto,['route' => ['CategoriaProducto.update',$categoria_producto->CodCategoriaP],'method'=>'put']) !!}
                    <?php $cont++; ?>
                    <td id="<?php echo 'nombre'.$cont; ?>" class="nombre">{{$categoria_producto->Nombre}}</td>
                    <td id="<?php echo 'editar'.$cont; ?>" class="editar">
                        <input type="text" name="nuevo" value="{{$categoria_producto->Nombre}}">
                        {!! Form::submit('Guardar Nuevo', ['class' => 'btn btn-success']) !!}
                    </td> 
                    {!! Form::close()!!}
                    <td style="text-align: center;">
                        <div  class="row" style="display: inline-block; text-align: center;">
                            <div style="display: inline-block; text-align: center;">
                                <button onclick="editar(<?php echo $cont; ?>)" class="btn btn-primary" title="Editar registro"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button>                            
                            </div>
                            <div style="display: inline-block; text-align: center;">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['CategoriaProducto.destroy',$categoria_producto->CodCategoriaP]]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Eliminar registro', 'onclick' => 'return confirm("Está seguro que quiere borrar este registro?");')) !!}
                                {!! Form::close() !!}                      
                            </div>                     
                        </div>
                    </td>  
                </tr>
                @empty
                <p>No existen categorias de productos registradas!</p>
                @endforelse
            </tbody>            
        </table>
    </div>
    <div class="row">
        {{$categoria_productos->links()}} 
    </div>
</div>
@endsection