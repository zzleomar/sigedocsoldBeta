<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JefeDepartamento extends Model
{
    protected $table = 'jefedepartamento';
 protected $primaryKey='id_jefedepartamento';
 protected $fillable=['id_profesor','id_dependencia'];
}