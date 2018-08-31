<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Repartidor extends Model
{
    protected $table = 'repartidor';
    protected $primary_key = 'CodRepartidor';
    
    protected $fillable = array('CodLocal');
    
    public function local(){
        return $this->belongsTo('patio\Local', 'CodLocal', 'CodLocal');
    }
    
    public function despacho(){
        return $this->hasMany('patio\Despacho', 'CodRepartidor', 'CodRepartidor');
    }
}
