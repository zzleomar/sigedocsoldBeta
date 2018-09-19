<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dedicacion extends Model
{
    protected $table='dedicacion';
    protected $primaryKey='id_dedicacion';
    protected $fillable=['nombre_dedicacion','descripcion_dedicacion'];
  
}
