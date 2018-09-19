<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table='estudiante';
    protected $primaryKey='id_estudiante';
    protected $fillable=['id_user','id_tipo','id_dependencia','cargo_estudiante'];
    
    
}
