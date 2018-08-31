<div class="container col-md-6 col-md-offset-3">
  <div class="panel panel-default">
    <div class="panel-heading">Nuevo producto</div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('Nombre','Nombre*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Nombre',  null, ['class' => ' form-control', 'id' => 'Nombre', 'placeholder' => 'Escriba el nombre del producto']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Descripcion','Descripción:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::textarea('Descripcion', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Escriba la descripción']) !!} 
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Tamaño','Medida:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Tamaño', null, ['class' => 'form-control', 'placeholder' => 'Ej. 350 cc.']) !!} 
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Precio','Precio:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::number('Precio',  null, ['class' => ' form-control', 'id' => 'Precio', 'placeholder' => '00,00']) !!}
            </div>
        </div> 
        <div class="form-group">
            {!! Form::label('Costo','Costo:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::number('Costo',  null, ['class' => ' form-control', 'id' => 'Costo', 'placeholder' => '00,00']) !!}
            </div>
        </div> 
        <div class="form-group">
            {!! Form::label('Foto','Foto:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                <input type="file" class="form-control" name="Foto" id="Foto" >
            </div>
        </div> 
        <div class="form-group">
            {!! Form::label('CategoriaProducto','Categoria de producto*:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-9">
                <select id="CategoriaProducto" name="CategoriaProducto" class="form-control">
                    <option value="0" disabled selected>--Escoja una categoria--</option>
                    @foreach($categoria_productos as $categoria_producto)
                        <option value="{{$categoria_producto->CodCategoriaP}}">{{$categoria_producto->Nombre}}</option>
                    @endforeach
                </select>                  
            </div>            
        </div>
        <div style="text-align: center;">
            {!! Form::submit($textoBotonDeFormulario, ['class' => 'btn btn-success']) !!}
            {!! Form::close()!!}        
            <a href="{{route('Producto.index')}}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
  </div>
</div>
