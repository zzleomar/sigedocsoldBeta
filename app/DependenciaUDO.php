<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DependenciaUDO extends Model
{
    protected $table='dependencia_udo';
    protected $primaryKey='id_dependencia';
    protected $fillable=['descripcion','siglas','responsable_ejec'];
  

}
