<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'local';
    protected $primary_key = 'CodLocal';
    
    protected $fillable = array('Nombre','Descripcion', 'Contacto', 'Correo', 'Telefono', 'Celular', 'Logotipo', 'CodCategoriaL');
   
    public function categoria_local(){
        return $this->belongsTo('patio\CategoriaLocal', 'CodCategoriaL', 'CodCategoriaL');
    }
    
    public function despachador(){
        return $this->hasMany('patio\Despachador', 'CodLocal', 'CodLocal');
    }
    
    public function repartidor(){
        return $this->hasMany('patio\Repartidor', 'CodLocal', 'CodLocal');
    }
    
    public function producto(){
        return $this->hasMany('patio\Producto', 'CodLocal', 'CodLocal');
    }
    
    public function categoria_producto(){
        return $this->hasMany('patio\CategoriaProducto', 'CodLocal', 'CodLocal');
    }
}
