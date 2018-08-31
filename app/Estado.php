<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    protected $primary_key = 'CodEstado';
    
    protected $fillable = array('Nombre', 'Descripcion');

}
