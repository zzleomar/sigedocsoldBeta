<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
     protected $table='perfil';
    protected $primaryKey='id_perfil';
    protected $fillable=['nombre_perfil','descripcion_perfil'];
    public function user()
    {
        return $this->hasMany('App\User');
    }
  
}
