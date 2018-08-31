<?php

namespace patio;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $primary_key = 'CodPermiso';
    
    protected $fillable = array('CodGrupo','Descripcion');

}
