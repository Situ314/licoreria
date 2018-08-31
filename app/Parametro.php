<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $table = 'parametro';
    protected $primary_key = 'CodParametro';
    
    protected $fillable = array('Codigo', 'Numero', 'Cadena');
}
