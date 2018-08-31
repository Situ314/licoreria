<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Despachador extends Model
{
    protected $table = 'despachador';
    protected $primary_key = 'CodDespachador';
    
    protected $fillable = array('CodLocal');
    
    public function local(){
        return $this->belongsTo('patio\Local', 'CodLocal', 'CodLocal');
    }
    
    public function despacho(){
        return $this->hasMany('patio\Despacho', 'CodDespachador', 'CodDespachador');
    }
    
    public function maestro_pedido(){
        return $this->hasMany('patio\MaestroPedido', 'CodDespachador', 'CodDespachador');
    }
}
