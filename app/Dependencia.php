<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    //
    protected $table='dependencia';
    protected $primaryKey='id_dependencia';
    protected $fillable=['id_user','id_institucion','nombre_dependencia','descripcion_dependencia','relacion_dependencia','cedula_jefe'];
  

}