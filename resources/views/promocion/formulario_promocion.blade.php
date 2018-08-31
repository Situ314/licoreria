<head>
<script type="text/javascript">    
    $(document).ready(function(){        
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            locale: "es",
            autoclose: true
        }); 
    });
</script>  
</head>
<div class="container col-md-6 col-md-offset-3">
  <div class="panel panel-default">
    <div class="panel-heading">Nueva promoción</div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('CodProducto','Producto*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                <select id="CodProducto" name="CodProducto" class="form-control">
                    <option value="">--Seleccione un producto--</option>
                    @foreach($productos as $producto)
                        <option value="{{$producto->CodProducto}}">{{$producto->Nombre}}</option>
                    @endforeach
                </select> 
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Nombre','Nombre*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::text('Nombre',  null, ['class' => ' form-control', 'id' => 'Nombre', 'placeholder' => 'Escriba el nombre de la promocion']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Descripcion','Descripción:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::textarea('Descripcion', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Escriba la descripción']) !!} 
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Foto','Foto:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                <input type="file" class="form-control" name="Foto" id="Foto" >
            </div>
        </div> 
        <div class="form-group">
            {!! Form::label('Descuento','Descuento (%):', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!! Form::number('Descuento',  null, ['class' => ' form-control', 'id' => 'Descuento', 'placeholder' => '00,00']) !!}
            </div>
        </div> 
        <div class="form-group">
            {!! Form::label('Desde','Desde:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                <div class='input-group date' class="datepicker" id="datepicker">
                    {!! Form::text('Desde',  null, ['class' => 'datepicker form-control', 'id' => 'datepicker']) !!}
                    <span class="input-group-addon" id="datepicker">
                        <span class="fa fa-calendar" id="datepicker">
                            <a id="datepicker" hidden></a>
                        </span>
                    </span>
                </div> 
            </div>
        </div> 
        <div class="form-group">
            {!! Form::label('Hasta','Hasta:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                <div class='input-group date' class="datepicker" id="datepicker">
                    {!! Form::text('Hasta',  null, ['class' => 'datepicker form-control', 'id' => 'datepicker']) !!}
                    <span class="input-group-addon" id="datepicker">
                        <span class="fa fa-calendar" id="datepicker">
                            <a id="datepicker" hidden></a>
                        </span>
                    </span>
                </div> 
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Estado','Estado*:', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
                {!!Form::radio('Estado', '1')!!} Celular
                {!!Form::radio('Estado', '0')!!} Ambos
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div style="text-align: center;">
            {!! Form::submit($textoBotonDeFormulario, ['class' => 'btn btn-success']) !!}
            {!! Form::close()!!}        
            <a href="{{route('Promocion.index')}}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
  </div>
</div>
