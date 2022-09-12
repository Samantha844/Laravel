<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = [
        'id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'fecha-nacimiento',
        'ciudad',
        'direccion',
        'genero',
        'telefono',
        'codigo_empleado',
        'puesto',
        'edad',
        'salario',
        'tipo_moneda',
        'activo',
    ];

    public function datosContacto()
    {
        return $this->hasMany('App\DatosContacto','empleado_id','id');
    }
}
