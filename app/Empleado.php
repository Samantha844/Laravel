<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = ['id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'fecha-nacimiento',
        'direccion',
        'genero',
        'telefono',
        'codigo_empleado'
    ];
}
