<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciclista extends Model
{
    protected $table        = 'ciclista';
    protected $primaryKey   = 'id_ciclista';
    public    $incrementing = true;
    public    $timestamps   = false;

    protected $fillable = [
        'nombres','apellidos','email','equipo',
        'telefono','fecha_nacimiento','pais',
        'referencia','tipo_carrera','nombre_carrera',
        'pais_carrera','imagen',
    ];
}
