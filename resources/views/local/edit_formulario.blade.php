<div class="container col-md-6 col-md-offset-3">
  <div class="panel panel-default">
    <div class="panel-heading">Modifica local</div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('Nombre','Nombre*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Nombre',  null, ['class' => ' form-control', 'id' => 'Nombre', 'placeholder' => 'Escriba nombre del local']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Descripcion','Descripción:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::textarea('Descripcion',  null, ['class' => ' form-control', 'id' => 'Descripcion', 'placeholder' => 'Descripción', 'rows' => '2']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Contacto','Contacto*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Contacto',  null, ['class' => ' form-control', 'id' => 'Contacto', 'placeholder' => 'Escriba nombre del contacto']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Correo','Correo:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::email('Correo',  null, ['class' => ' form-control', 'id' => 'Correo', 'placeholder' => 'Ej. ejemplo@correo.com']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Telefono','Telefono:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Telefono',  null, ['class' => ' form-control', 'id' => 'Telefono', 'placeholder' => 'Escriba su telefono']) !!}
            </div>
        </div>        
        <div class="form-group">
            {!! Form::label('Celular','Celular:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Celular',  null, ['class' => ' form-control', 'id' => 'Celular', 'placeholder' => 'Escriba su celular']) !!}
            </div>
        </div>        
        <div class="form-group">
            {!! Form::label('Logotipo','Logotipo:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                <input type="file" class="form-control" name="Logotipo" >
            </div>
        </div>        
        <div class="form-group">
            {!! Form::label('CategoriaLocal','Categoria de local*:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-9">
                <select id="CategoriaLocal" name="CategoriaLocal" class="form-control">
                    @foreach($categoria_local as $categoria)
                        <option value="{{$categoria->CodCategoriaL}}">{{$categoria->Nombre}}</option>
                    @endforeach
                    @foreach($categoria_locales as $categoria_local)
                        <option value="{{$categoria_local->CodCategoriaL}}">{{$categoria_local->Nombre}}</option>
                    @endforeach
                </select>                  
            </div>            
        </div>
        <br><br>
        <div class="col-md-12" style="text-align: center;">
            {!! Form::submit($textoBotonDeFormulario, ['class' => 'btn btn-success']) !!}
            {!! Form::close()!!}        
            <a href="{{route('Local.index')}}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
  </div>
</div>
