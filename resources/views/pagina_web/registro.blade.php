@extends('pagina_web.master_page')

@section('cuerpo')
<script type="text/javascript">
$(document).ready(function() {
    jQuery.validator.addMethod("mivalidacionespecial", function(value, element) {
        if ($("#activar").is(':checked') && value=='')
            return false;
        else
            return true;
    }, "Debe registrsr este campo");

    $("#Formulario").validate({	
        errorClass:'bg-danger',
        onkeyup: false,
        rules: {
            Numero: {
		mivalidacionespecial : true
            },
            Zona: {
                mivalidacionespecial: true
            },
            Referencia: {
                mivalidacionespecial: true
            }, 
            Nombre:{
                required: true
            },
            Email:{
                required: true
            },
            username:{
                required: true
            },
            password:{
                required: true
            }
        },
        messages: {
            Numero:{
                mivalidacionespecial: "Debe ingresar su número de casa."
            },
            Zona: {
                mivalidacionespecial: "Debe ingresar su zona."
            },
            Referencia: {
                mivalidacionespecial: "Debe ingresar una referencia."
            },
            Nombre:{
                required: "Debe ingresar su nombre."
            },
            Email:{
                required: "Debe ingresar su correo."
            },
            username:{
                required: "Debe ingresar su usuario."
            },
            password:{
                required: "Debe ingresar su contraseña."
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

    <!--=*=*=checkout area=*=*=*-->
    <div class="check_out_login_area spt wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span>Regresar a login?<a href="{{url('login_web')}}"> Click aqui para ingresar</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="check_out_page_area sp wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h2 style="color: #8A0401;"><b>Datos de registro</b></h2>
                    {!! Form::open(['method' => 'POST','route' => 'Cliente.store', 'class' => 'check_out_fotm', 'id' => 'Formulario'])!!}
                        <div class="row">                          
                            <div class="col-sm-12">
                                <span>Nombre completo*</span>
                                {!! Form::text('Nombre') !!}
                            </div>
                            <div class="col-sm-12">
                                <span>Correo*</span>
                                {!! Form::email('Email') !!}                                
                            </div>
                            <div class="col-sm-4">
                                <span>NIT/CI</span>
                                {!! Form::text('NIT') !!}
                            </div>
                            <div class="col-sm-8">
                                <span>Nombre para factura</span>
                                {!! Form::text('NombreFactura') !!}                                
                            </div>
                            <div class="col-sm-6">
                                <span>Telefono</span>
                                {!! Form::text('Telefono') !!}
                            </div>
                            <div class="col-sm-6">
                                <span>Celular</span>
                                {!! Form::text('Celular') !!}
                            </div>        
                            <!---------------------------Direccion------------------------------->
                            <input id="activar" name="activar" type="checkbox" hidden>
                            <label class="inputlabel" for="activar">Quiero llenar los datos de mi domicilio ahora</label>
                            <div class="desplegable">                            
                                <div class="col-sm-4">
                                    <span>Nº de puerta*</span>
                                    {!! Form::text('Numero') !!}
                                </div> 
                                <div class="col-sm-8">
                                    <span>Zona*</span>
                                    {!! Form::text('Zona') !!}
                                </div> 
                                <div class="col-sm-12">
                                    <span>Referencia para llegar a su domicilio *</span>
                                    {!! Form::text('Referencia') !!}
                                </div>

                                <div class="col-sm-12">
                                    <span>Dirección *<h6>(Registra una o las dos opciones)</h6></span>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-6">{!! Form::text('Direccion') !!}</div>
                                    <div class="col-sm-6"><a type="submit"  class="btn btn btn-danger form-control" style="margin-top: 10px;">Ubicar en el mapa</a></div>
                                </div>  
                            </div>
                             <!---------------------------FIN Direccion------------------------------->   
                            <div class="col-sm-6">
                                <span>Usuario*</span>
                                {!! Form::text('username') !!}
                            </div>
                            <div class="col-sm-6">
                                <span>Contraseña *</span>
                                {!! Form::text('password') !!}
                            </div>
                            <div class="col-sm-12">
                                {!! Form::submit('Listo!', ['class' => 'btn btn-danger']) !!}
                            </div>                             
                            <input type="hidden" name="Latitud" id="Latitud" >
                            <input type="hidden" name="Longitud" id="Longitud" >
                        </div>
                    {!! Form::close()!!}
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
                                    function loadmap() {
                                            // initialize map
                                            var map = new google.maps.Map(document.getElementById("map-canvas"), {
                                                    center: new google.maps.LatLng(-16.5111082,-68.1328458),
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
