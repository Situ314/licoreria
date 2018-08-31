<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    protected $table = 'despacho';
    protected $primary_key = 'CodDespacho';
    
    protected $fillable = array('CodPedido', 'CodRepartidor', 'CodDespachador', 'CodEstado');
    
    public function maestro_venta(){
        return $this->hasMany('patio\MaestroVenta', 'CodDespacho', 'CodDespacho');
    }
    
    public function despachador(){
        return $this->belongsTo('patio\Despachador', 'CodDespachador', 'CodDespachador');
    }
    
    public function maestro_pedido(){
        return $this->belongsTo('patio\MaestroPedido', 'CodPedido', 'CodPedido');
    }
    
    public function repartidor(){
        return $this->belongsTo('patio\Repartidor', 'CodRepartidor', 'CodRepartidor');
    }
}
