<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primary_key = 'CodCliente';
    
    protected $fillable = array('Direccion', 'Zona', 'Numero', 'Referencia', 'Latitud', 'Longitud', 'NIT', 'NombreFactura');
    
    public function maestro_pedido(){
        return $this->hasMany('patio\MaestroPedido', 'CodCliente', 'CodCliente');
    }
    
    public function maestro_venta(){
        return $this->hasMany('patio\MaestroVenta', 'CodCliente', 'CodCliente');
    }
}
