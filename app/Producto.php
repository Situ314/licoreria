<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primary_key = 'CodProducto';
    
    protected $fillable = array('CodLocal', 'CodCategoriaP', 'Nombre', 'Descripcion', 'Precio', 'Costo', 'Tamaño', 'Foto', 'Disponible', 'Activo');
    
    public function local(){
        return $this->belongsTo('patio\Local', 'CodLocal', 'CodLocal');
    }
    
    public function categoria_producto(){
        return $this->belongsTo('patio\CategoriaProducto', 'CodCategoriaP', 'CodCategoriaP');
    }
    
    public function detalle_pedido(){
        return $this->hasMany('patio\DetallePedido', 'CodProducto', 'CodProducto');
    }
    
    public function detalle_venta(){
        return $this->hasMany('patio\DetalleVenta', 'CodProducto', 'CodProducto');
    }
    
    public function promocion(){
        return $this->hasOne('patio\Promocion', 'CodProducto', 'CodProducto');
    }
}
