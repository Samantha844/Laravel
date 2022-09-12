<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosContacto extends Model
{
    //
    protected $table = 'datoscontacto';

    protected $fillable = [
        'id',
        'empleado_id',
        'nombre_contacto',
        'email',
        'telefono',
        'direccion',
        'ciudad',
        'estado',
        'cp',


        'principal',
        'eliminado'
    ];
}
