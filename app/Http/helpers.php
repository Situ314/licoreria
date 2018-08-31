<?php

 
function currentUser()
{
    return auth()->user();
}
function FechaParaMySQL($Fecha) {
    if( $Fecha!='') {
        $Fecha = strtr($Fecha, '-', '/');  //convierte a dd/mm/aaaa
        $Fecha = implode( '/', array_reverse( explode( '/', $Fecha ) ) ) ;
    }
    return $Fecha;
}
//
function FechaDeMySQL($Fecha) {
    if( $Fecha!='') {
        $Fecha = strtr($Fecha, '-', '/');  //convierte a aaaa/mm/dd
        $Fecha = implode( '/', array_reverse( explode( '/', $Fecha ) ) ) ;
    }
    return $Fecha;
}

function stock($CodProducto){
    $Stock = \Illuminate\Support\Facades\DB::select('Select com.TotalCompra - ven.TotalVenta as Stock FROM (select CodProducto, sum(Cantidad) as TotalCompra from detalle_compra group by CodProducto) com, (select CodProducto, sum(Cantidad) as TotalVenta from detalle_venta group by CodProducto) ven WHERE com.CodProducto LIKE ?', [$CodProducto]);
    return $Stock; 
}