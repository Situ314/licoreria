<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';
    protected $primary_key = 'CodGrupo';
    
    protected $fillable = array('Nombre');
    
    public function user(){
        return $this->hasMany('patio\User', 'CodGrupo', 'CodGrupo');
    }
}
