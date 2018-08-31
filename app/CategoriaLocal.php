<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class CategoriaLocal extends Model
{
    protected $table = 'categoria_local';
    protected $primary_key = 'CodCategoriaL';
    
    protected $fillable = array('Nombre');
    
    public function local(){
        return $this->hasMany('patio\Local', 'CodCategoriaL', 'CodCategoriaL');
    }
}
