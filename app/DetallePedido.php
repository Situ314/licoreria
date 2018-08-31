<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedido';
    protected $primary_key = 'CodDetallePedido';
    
    protected $fillable = array('CodPedido', 'CodProducto', 'Precio', 'Cantidad', 'CodPromocion');
    
    public function producto(){
        return $this->belongsTo('patio\Producto', 'CodProducto', 'CodProducto');
    }
    
    public function promocion(){
        return $this->belongsTo('patio\Promocion', 'CodPromocion', 'CodPromocion');
    }
    
    public function maestro_pedido(){
        return $this->belongsTo('patio\MaestroPedido', 'CodPedido', 'CodPedido');
    }
}
