<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    protected $table = 'categoria_producto';
    protected $primary_key = 'CodCategoriaP';
    
    protected $fillable = array('Nombre', 'CodLocal');
    
    public function local(){
        return $this->belongsTo('patio\Local', 'CodLocal', 'CodLocal');
    }
    
    public function producto(){
        return $this->hasMany('patio\Producto', 'CodCategoriaP', 'CodCategoriaP');
    }
}
