<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutasP extends Model
{
       protected $table = 'rutasp';
   protected $primaryKey='id_ruta_p';
   protected $fillable=['id_estado','id_preparaduria','id_dependencia','id_user','fecha'];
}
