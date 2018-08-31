<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class MaestroVenta extends Model
{
    protected $table = 'maestro_venta';
    protected $primary_key = 'CodVenta';
    
    protected $fillable = array('CodLocal', 'Numero', 'Fecha', 'CodDespacho', 'CodCliente', 'Total');
    
    public function cliente(){
        return $this->belongsTo('patio\Cliente', 'CodCliente', 'CodCliente');
    }
    
    public function despacho(){
        return $this->hasMany('patio\Despacho', 'CodDespacho', 'CodDespacho');
    }
    
    public function detalle_venta(){
        return $this->hasMany('patio\DetalleVenta', 'CodVenta', 'CodVenta');
    }
}
