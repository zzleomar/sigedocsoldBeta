<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesor';
    protected $primaryKey='id_profesor';
    protected $fillable=['id_user','id_tipo','id_dependencia','id_dedicacion','cargo_profesor'];
   
}
