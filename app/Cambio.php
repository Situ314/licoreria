<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Cambio extends Model
{
    protected $table = 'cambio';
    protected $primary_key = 'CodCambio';
    
    protected $fillable = array('CodPedido', 'Monto', 'TotalPedido', 'Cambio', 'CodPromocion');
}
