<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciclista extends Model
{
    protected $table = 'ciclista';
    protected $primaryKey = 'id_ciclista';
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'equipo',
        'telefono',
        'fecha_nacimiento',
        'pais_origen',
        'referencia_cicla',
        'tipo_carrera',
        'nombre_carrera',
        'pais_carrera',
        'imagen',
    ];
}
