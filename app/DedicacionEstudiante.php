<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DedicacionEstudiante extends Model
{
    protected $table='dedicacion_estudiante';
    protected $primaryKey='id_dedicacion_estudiante';
    protected $fillable=['nombre'];
  
}