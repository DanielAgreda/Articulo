<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    protected $table        = 'users';
    protected $primaryKey   = 'id_user';
    public    $incrementing = true;
    public    $timestamps   = false;

    protected $fillable = [
        'Cargo','Equipo','nombre','apellidos','fecha_nacimiento',
        'sexo','telefono','email','pais','ciudad','direccion','contrasenia'
    ];

    protected $hidden = ['contrasenia'];

    /**
     * Laravel usará "contrasenia" en lugar de "password"
     */
    public function getAuthPassword()
    {
        return $this->contrasenia;
    }

    /**
     * Identificador único para JWT
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Claims personalizados para JWT (puedes agregar roles aquí si quieres)
     */
    public function getJWTCustomClaims()
    {
        return [
            'email' => $this->email,
            'nombre' => $this->nombre,
        ];
    }
}
