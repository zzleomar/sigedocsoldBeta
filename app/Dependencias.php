<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    protected $table='dependencias';
    protected $primaryKey='id_dependencias';
    protected $fillable=['id_departamento','nombre'];
  
}
