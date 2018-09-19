<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    protected $fillable = [
        'nombre'
    ];
     
     public function users()
    {   
        return $this->hasMany('App\User','rol_id');
    }
}
