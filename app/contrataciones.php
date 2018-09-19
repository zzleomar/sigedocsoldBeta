<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contrataciones extends Model
{
     protected $table = 'contratacion';
    protected $primaryKey='id_contratacion';
    protected $fillable=['id_oficio','id_user','id_asignatura','periodo'];

}
