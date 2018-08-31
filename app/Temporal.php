<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Temporal extends Model
{
    protected $table = 'detalle_pedido_temp';
    protected $primary_key = 'CodTemporal';
    
    protected $fillable = array('CodProducto', 'id', 'Precio', 'Cantidad', 'CodPromocion');

}
