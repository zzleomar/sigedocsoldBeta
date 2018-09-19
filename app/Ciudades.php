<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    protected $table='ciudad';
    protected $primaryKey='id_ciudad';
    protected $fillable=['id_pais','id_state','id_municipio','nombre'];
      public static function ciudades($id)
    {
        return Ciudades::where('id_municipio', $id)->get();
    }
}
