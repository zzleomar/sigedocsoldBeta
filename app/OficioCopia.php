<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OficioCopia extends Model
{
    protected $table = 'oficio_copia';
    protected $primaryKey='id_oficio_copia';
    protected $fillable=['id_oficio','id_dependencia'];

}
