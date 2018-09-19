<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinos extends Model
{
    protected $table = 'destinos';
    protected $primaryKey='id_destino';
    protected $fillable=['id_documento','id_dependencia'];

}
