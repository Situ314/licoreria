<?php

namespace patio;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nombre', 'Telefono', 'Celular', 'email', 'CodGrupo', 'Activo', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function grupo(){
        return $this->belongsTo('patio\Grupo', 'CodGrupo', 'CodGrupo');
    }
}
