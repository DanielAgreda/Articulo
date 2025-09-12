<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table        = 'users';
    protected $primaryKey   = 'id_user';
    public    $incrementing = true;
    public    $timestamps   = false;

    protected $fillable = [
        'Cargo','Equipo','nombre','apellidos','fecha_nacimiento',
        'sexo','telefono','email','pais','ciudad','direccion',
    ];

    protected $hidden = ['contrasenia'];

    // Laravel usará "contrasenia" en lugar de "password"
    public function getAuthPassword()
    {
        return $this->contrasenia;
    }
}
