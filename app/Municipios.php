<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
   protected $table='municipio';
    protected $primaryKey='id_municipio';
    protected $fillable=['id_pais','id_state','nombre'];
    public static function municipios($id)
    {
        return Municipios::where('id_state', $id)->get();
    }
}
