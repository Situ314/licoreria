<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promocion';
    protected $primary_key = 'CodPromocion';
    
    protected $fillable = array('CodProducto', 'Nombre', 'Descripcion', 'Descuento', 'Desde', 'Hasta', 'Disponible', 'Activo');
    
    public function producto(){
        return $this->belongsTo('patio\Producto', 'CodProducto', 'CodProducto');
    }
    
    public function detalle_pedido(){
        return $this->hasMany('patio\DetallePedido', 'CodPromocion', 'CodPromocion');
    }
    
    public function detalle_venta(){
        return $this->hasMany('patio\DetalleVenta', 'CodPromocion', 'CodPromocion');
    }
}
