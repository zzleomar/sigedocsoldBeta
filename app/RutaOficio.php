<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutaOficio extends Model
{
    protected $table = 'ruta_oficio';
 protected $primaryKey='id_ruta_oficio';
 protected $fillable=['id_estado','id_oficio','id_dependencia','id_user','fecha'];

}
