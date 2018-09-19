<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
   protected $table = 'ruta';
   protected $primaryKey='id_ruta';
   protected $fillable=['id_estado','id_documento','id_dependencia','id_user','fecha'];
  
}
