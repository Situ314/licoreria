<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_venta';
    protected $primary_key = 'CodDetalleVenta';
    
    protected $fillable = array('CodVenta', 'CodProducto', 'Precio', 'Cantidad', 'CodPromocion');
    
    public function producto(){
        return $this->belongsTo('patio\Producto', 'CodProducto', 'CodProducto');
    }
    
    public function promocion(){
        return $this->belongsTo('patio\Promocion', 'CodPromocion', 'CodPromocion');
    }
    
    public function maestro_venta(){
        return $this->belongsTo('patio\MaestroVenta', 'CodVenta', 'CodVenta');
    }
}
