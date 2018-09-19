<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'id_personal';
    protected $fillable = [
        'unidad_ejecutora',
        'unidad_asignado',
        'nacionalidad',
        'cedula',
        'nombre',
        'apellido',
        'telefono_habitacion',
        'telefono_oficina',
        
    ];  
}
