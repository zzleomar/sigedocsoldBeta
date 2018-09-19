<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table='tipo';
    protected $primaryKey='id_tipo';
    protected $fillable=['nombre_tipo','descripcion_tipo'];
}
