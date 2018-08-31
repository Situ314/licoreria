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
            $('#CodProducto').selectpicker('val', 0);
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

    function Calcular() {
        var Suma = $("#Suma").val();
        var Descuento = $("#Descuento").val();
        var Pos = Descuento.indexOf('%');
        if( Pos>=0 ) {
            Descuento = Descuento.substring(0, Pos);
            Descuento = parseFloat(Descuento)/100;
            Descuento = Suma*Descuento;
            $("#Descuento").val(Descuento.toFixed(2));
        };
        var Subtotal = Suma-Descuento;
        $("#Subtotal").val(Subtotal.toFixed(2));
    };

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
        Calcular();
    };

    $( ".Guardar" ).click(function(e) {
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