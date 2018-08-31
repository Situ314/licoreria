<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'detalle_compra';
    protected $primary_key = 'CodDetalleCompra';
    
    protected $fillable = array('CodCompra', 'CodProducto', 'Precio', 'Cantidad');
    
    public function producto(){
        return $this->belongsTo('patio\Producto', 'CodProducto', 'CodProducto');
    }
    
    public function maestro_compra(){
        return $this->belongsTo('patio\MaestroCompra', 'CodCompra', 'CodCompra');
    }
}
