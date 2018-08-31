<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class DetallePedidoTemp extends Model
{
    protected $table = 'detalle_pedido_temp';
    protected $primary_key = 'CodProducto';
    
    protected $fillable = array('CodProducto', 'id', 'Precio', 'Cantidad', 'CodPromocion');

}
