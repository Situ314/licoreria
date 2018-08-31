<div class="container col-md-6 col-md-offset-3">
  <div class="panel panel-default">
    <div class="panel-heading">Nuevo cliente</div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('Nombre','Nombre*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Nombre',  null, ['class' => ' form-control', 'placeholder' => 'Escriba su nombre']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('NIT','NIT:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('NIT',  null, ['class' => ' form-control', 'placeholder' => 'Escriba su NIT/CI']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Telefono','Telefono:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Telefono',  null, ['class' => ' form-control', 'placeholder' => 'Escriba el telefono']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Celular','Celular:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Celular',  null, ['class' => ' form-control', 'placeholder' => 'Escriba el celular']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Email','Correo*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::email('Email',  null, ['class' => ' form-control', 'placeholder' => 'Ej. correo@cuenta.com']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Numero','Número:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Numero',  null, ['class' => ' form-control', 'placeholder' => 'Escriba el número de puerta']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Referencia','Referencia:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::textarea('Referencia',  null, ['class' => ' form-control', 'rows' => '3', 'placeholder' => 'Escriba una referencia de llegada']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Direccion','Dirección:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                <button type="submit" style="background-color: red; color: white;" class="btn form-control">Ubicar dirección el el mapa</button>
            </div>
        </div>        
        <div class="form-group">
            {!! Form::label('username','Usuario*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('username',  null, ['class' => ' form-control', 'placeholder' => 'Escriba el nombre de usuario']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password','Contraseña*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('password',  null, ['class' => ' form-control', 'placeholder' => 'Escriba contraseña del usuario']) !!}
            </div>
        </div>
        <div style="text-align: center;">
            {!! Form::submit($textoBotonDeFormulario, ['class' => 'btn btn-success']) !!}
            {!! Form::close()!!}        
            <a href="{{route('Cliente.index')}}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
  </div>
</div>
