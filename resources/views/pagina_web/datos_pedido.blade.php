@extends('pagina_web.master_page')

@section('cuerpo')
<script type="text/javascript">
$(document).ready(function() {
    $("#Formulario").validate({	
        errorClass:'bg-danger',
        onkeyup: false,
        rules: {
            Numero: {
		required : true
            },
            Zona: {
                required: true
            },
            Referencia: {
                required: true
            }
        },
        messages: {
            Numero:{
                required: "Debe ingresar su número de casa."
            },
            Zona: {
                required: "Debe ingresar su zona."
            },
            Referencia: {
                required: "Debe ingresar una referencia."
            }
        }
    });
});
</script>

<style>
    /*registrar domicilio*/
    #activar ~ .desplegable {display: none;overflow: hidden;} 
    #activar:checked ~ .desplegable {display: block;}
</style>

<div class="check_out_page_area sp wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <h2 style="color: #8A0401;"><b>Datos de pedido</b></h2>                       
                {!! Form::open(['method' => 'POST','route' => 'Pedido.store', 'class' => 'check_out_fotm', 'id' => 'Formulario', 'name' => 'Formulario'])!!}
                    <div class="row">                          
                        <!---------------------------Direccion------------------------------->                          
                        <div class="col-sm-4">
                            <span>Nº de puerta*</span>
                            <input type="text" name="Numero" id="Numero" value="{{$cliente->Numero}}">
                        </div> 
                        <div class="col-sm-8">
                            <span>Zona*</span>
                            <input type="text" name="Zona" id="Zona" value="{{$cliente->Zona}}">
                        </div> 
                        <div class="col-sm-12">
                            <span>Referencia para llegar a su domicilio *</span>
                            <input type="text" name="Referencia" id="Referencia" value="{{$cliente->Referencia}}">
                        </div>

                        <div class="col-sm-12">
                            <span>Dirección *<h6>(Escriba su dirección o ubiquela en el mapa)</h6></span>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="Direccion" id="Direccion" value="{{$cliente->Direccion}}">                                    
                        </div>  
                        <input type="hidden" name="Latitud" id="Latitud" >
                        <input type="hidden" name="Longitud" id="Longitud" >
                         <!---------------------------FIN Direccion-------------------------------> 
                        <h2 style="color: #8A0401;"><b>Datos de factura</b></h2>                       
                        <div class="row">                          
                            <div class="col-sm-12">
                                <span>NIT/CI</span>
                                <input type="text" name="NIT" id="NIT" value="{{$cliente->NIT}}" class="form-control">
                            </div> 
                            <div class="col-sm-12">
                                <span>Nombre</span>
                                <input type="text" name="NombreFactura" id="NombreFactura" value="{{$cliente->NombreFactura}}" class="form-control">
                            </div> 
                        </div>
                        {!! Form::close()!!}
                        <div class="col-sm-12">
                            {!! Form::submit('Listo!', ['class' => 'btn btn-danger']) !!}
                        </div>
                    </div>
                
            </div>
            <div class="col-sm-5">
                <html>
                    <head>
                        <style>
                            #map-search { position: absolute; top: 10px; left: 10px; right: 10px; }
                            #search-txt { float: left; width: 60%; }
                            #search-btn { float: left; width: 19%; }
                            #detect-btn { float: right; width: 19%; }
                            #map-canvas { position: relative; width: 480px; height: 600px; margin-top: 50px;}
                            #map-output { position: relative; bottom: 10px; left: 10px; right: 10px; }
                            #map-output a { float: right; }
                        </style>
                    </head>
                    <body>
                        <div id="map-search">
                                <input id="search-txt" type="text" value="Sopocachi" maxlength="100">
                                <input id="search-btn" type="button" value="Buscar..">
                        </div>
                        <div id="map-canvas"></div>
                        <div id="map-output">
                        </div>
                        <script type="text/javascript">
                            var Latitud = {!!$cliente->Latitud!!};
                            var Longitud = {!!$cliente->Longitud!!};
                            function loadmap() {
                                // initialize map
                                var map = new google.maps.Map(document.getElementById("map-canvas"), {
                                        center: new google.maps.LatLng(Latitud,Longitud),
//                                        center: new google.maps.LatLng(-16.5111082,-68.1328458),
                                        zoom: 13,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                });
                                // initialize marker
                                var marker = new google.maps.Marker({
                                        position: map.getCenter(),
                                        draggable: true,
                                        map: map
                                });
                                // intercept map and marker movements
                                google.maps.event.addListener(map, "idle", function() {
                                        marker.setPosition(map.getCenter());
                                        document.getElementById("map-output").innerHTML = "Latitude:  " + map.getCenter().lat().toFixed(6) + "<br>Longitude: " + map.getCenter().lng().toFixed(6);
                                        $('#Latitud').val(map.getCenter().lat().toFixed(6));$('#Longitud').val(map.getCenter().lng().toFixed(6));
                                });
                                google.maps.event.addListener(marker, "dragend", function(mapEvent) {
                                        map.panTo(mapEvent.latLng);
                                });
                                // initialize geocoder
                                var geocoder = new google.maps.Geocoder();
                                google.maps.event.addDomListener(document.getElementById("search-btn"), "click", function() {
                                        geocoder.geocode({ address: document.getElementById("search-txt").value }, function(results, status) {
                                                if (status == google.maps.GeocoderStatus.OK) {
                                                        var result = results[0];
                                                        document.getElementById("search-txt").value = result.formatted_address;
                                                        if (result.geometry.viewport) {
                                                                map.fitBounds(result.geometry.viewport);
                                                        } else {
                                                                map.setCenter(result.geometry.location);
                                                        }
                                                } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                                                        alert("Sorry, geocoder API failed to locate the address.");
                                                } else {
                                                        alert("Sorry, geocoder API failed with an error.");
                                                }
                                        });
                                });
                                google.maps.event.addDomListener(document.getElementById("search-txt"), "keydown", function(domEvent) {
                                        if (domEvent.which === 13 || domEvent.keyCode === 13) {
                                                google.maps.event.trigger(document.getElementById("search-btn"), "click");
                                        }
                                });
                                // initialize geolocation
                                if (navigator.geolocation) {
                                        google.maps.event.addDomListener(document.getElementById("detect-btn"), "click", function() {
                                                navigator.geolocation.getCurrentPosition(function(position) {
                                                        map.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
                                                }, function() {
                                                        alert("Sorry, geolocation API failed to detect your location.");
                                                });
                                        });
                                        document.getElementById("detect-btn").disabled = false;
                                }
                            }
                        </script>
                        <script src="//maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;key=AIzaSyB_CgX57lxFToLUH4Spir3FPbdxJlOZW8M&amp;callback=loadmap" defer></script>
                    </body>
                </html>
            </div>
        </div>
    </div>
</div>
@endsection