<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class MaestroPedido extends Model
{
    protected $table = 'maestro_pedido';
    protected $primary_key = 'CodPedido';
    
    protected $fillable = array('Numero', 'FechaHora', 'Direccion', 'Zona', 'NumeroPuerta', 'Referencia', 'Latitud', 'Longitud', 'NIT', 'NombreFactura', 'CodCliente', 'Estado');
    
    public function cliente(){
        return $this->belongsTo('patio\Cliente', 'CodCliente', 'CodCliente');
    }
    
    public function despachador(){
        return $this->belongsTo('patio\Despachador', 'CodDespachador', 'CodDespachador');
    }
    
    public function detalle_pedido(){
        return $this->hasMany('patio\DetallePedido', 'CodPedido', 'CodPedido');
    }
    
    public function despacho(){
        return $this->hasMany('patio\Despacho', 'CodPedido', 'CodPedido');
    }
}
