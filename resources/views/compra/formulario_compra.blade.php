<head>
<script type="text/javascript">    
    $(document).ready(function(){        
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            locale: "es",
            autoclose: true
        }); 
        
        $('#CodProducto').change(function(event) {
            event.preventDefault();
            var id = $('#CodProducto').val();
            $.get("{{ url('datos_producto/{id}')}}", {
               CodProducto: id,
            },
            function(data) {
               $('#Costo').val(data);
            });
        });
        
        $( "#Insertar" ).click(function(e) {
		var Cantidad = parseInt($('#Cantidad').val()) || 0;
                var Costo = parseInt($('#Costo').val()) || 0;

                if( $('#CodProducto').val()=='0' ) {
                        alert('Debe seleccionar un producto.');
                        $('#CodProducto').focus();
                }
                else if( Cantidad==0 ) {
                        alert('Registre la cantidad comprada.');
                        $('#Cantidad').focus();
                }
                else if( Costo==0 ) {
                        alert('Registre el precio de compra.');
                        $('#Costo').focus();
                }
                else {
                    var i=1;
                    var s = "<tr><td class='Numeracion'>"+(i++)+'</td>';
                    s += "<td style='display:none'>"+$('#CodProducto').val()+"</td>";
                    s += "<td>"+$('#CodProducto option:selected').text()+"</td>";
                    s += "<td class='text-right'>"+$('#Cantidad').val()+"</td>";
                    s += "<td class='text-right'>"+$('#Costo').val()+"</td>";
                    var Subtotal = parseInt($('#Cantidad').val())*parseFloat($('#Costo').val());
                                s += "<td class='text-right'>"+Subtotal.toFixed(2)+"</td>";
                    s += "<td><a href='#' class='btnEliminar btn btn-info btn-xs'>Eliminar</a></td></tr>";
                                $('#Cuerpo tbody').append(s);
                    Renumerar();
                    SumarTotales();
                    $('#Cantidad').val(''); $('#Costo').val('');
		}
	});
        function Renumerar() {
            var i=1;
            $(".Numeracion").each(function() {
                $(this).text(i++);
            });
        };        

       $( "#Cuerpo" ).on( "click", ".btnEliminar", function(e) {
           e.preventDefault();
           $( this ).parents( "tr" ).remove();
           Renumerar();
           SumarTotales();
        });
        
//        function Calcular() {
//            var Suma = $("#Suma").val();
//            var Descuento = $("#Descuento").val();
//            var Pos = Descuento.indexOf('%');
//            if( Pos>=0 ) {
//                Descuento = Descuento.substring(0, Pos);
//                Descuento = parseFloat(Descuento)/100;
//                Descuento = Suma*Descuento;
//                $("#Descuento").val(Descuento.toFixed(2));
//            };
//            var Subtotal = Suma-Descuento;
//            $("#Subtotal").val(Subtotal.toFixed(2));
//        };
        
        function SumarTotales() {
            var Suma = 0.0;         
            $("#Cuerpo tbody tr").each(
                function() {
                    var celdaValor = $(this).find('td:eq(5)');
                    if (celdaValor.val() != null) {
                        Suma += parseFloat(celdaValor.html().replace(',', ''));
                    }
                }
            )
            $('#Total').val(Suma.toFixed(2));
//            Calcular();
        };
        
        $( "#Guardar" ).click(function(e) {
            var CodProducto, Cantidad, Costo, s='';
            $('#Cuerpo tbody>tr').each(function(){
                    $(this).children("td").each(function (i) {
                            switch (i) {
                case 1: CodProducto = $(this).text();
                        break;
                case 3: Cantidad = $(this).text();
                        break;
                case 4: Costo = $(this).text();
                        break;
            };
                    });
                    s += ' ('+CodProducto+','+Cantidad+','+Costo+'),';
            });
            $('#Detalle').val(s.substr(0, s.length-1));
                if( $('#Detalle').val()=='' ) {
                        alert('No se han registrado los items comprados.');
                        e.preventDefault();
                }
        });
    });
</script>  
</head>
<div class="container col-md-12">
    <div class='panel panel-default'>	
        <div class="panel-body">
            <div class="row form-inline">
                <label> Fecha:</label>
                {!! Form::text('Fecha',  null, ['class' => 'datepicker form-control', 'id' => 'datepicker']) !!}
                <input type='text' class="form-control" id='Numero' name='Numero' placeholder='Numero' />
            </div>
        </div>
    </div>

    <div class='panel panel-default'>
        <div class="panel-body">
            <div class="row form-inline">
                <select id="CodProducto" name="CodProducto" class="form-control">
                    <option value="">--Seleccione un producto--</option>
                    @foreach($productos as $producto)
                        <option value="{{$producto->CodProducto}}">{{$producto->Nombre}}</option>
                    @endforeach
                </select>  
                <input type='number' class="form-control" size='5' id='Cantidad' name='Cantidad' placeholder='Cantidad' />
                <input type='number' class="form-control" size='10' id='Costo' name='Costo' placeholder='Costo' />
                <input type='button' id='Insertar' name='Insertar' class='btn-secundary' value='Insertar' />
            </div>
        </div>
    </div>
    <br />

    <div class='panel panel-default'>
        <div class="panel-body">
            <div class="table-responsive">
                <table id='Cuerpo' class='table table-bordered'>
                    <thead>
                        <tr><th>#</th> <th>Producto</th> <th>Cantidad</th> <th>Costo unit.</th> <th>Subtotal</th> <th>Acción</th></tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <div class="form-inline">
                <div class="table-responsive">
                    <table id='Totales' class='table table-condensed'>
                        <tbody>
                            <tr>
                                <td><label>Total:&nbsp;</label></td>
                                <td><input type='text' readonly id='Total' name='Total' class='text-right form-control' /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br />
    <input type='hidden' id='Detalle' name='Detalle' />
    <div style="text-align: center;">
        {!! Form::submit($textoBotonDeFormulario, ['class' => 'btn btn-success', 'id' => 'Guardar', 'name' => 'Guardar']) !!}
        {!! Form::close()!!}        
        <a href="{{route('Compra.index')}}" class="btn btn-primary">Cancel</a>
    </div>
</div>

<!--<script type="text/javascript" src="{{ asset('js/compra.js') }}"></script>-->