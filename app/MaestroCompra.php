<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class MaestroCompra extends Model
{
    protected $table = 'maestro_compra';
    protected $primary_key = 'CodCompra';
    
    protected $fillable = array('CodLocal', 'Numero', 'Fecha', 'Total');
    
    public function local(){
        return $this->belongsTo('patio\Local', 'CodLocal', 'CodLocal');
    }
    
    public function detalle_compra(){
        return $this->hasMany('patio\DetalleCompra', 'CodCompra', 'CodCompra');
    }
}
