<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellos extends Model
{
    protected $table='sello';
    protected $primaryKey='id_sello';
    protected $fillable=['id_dependencia','sello'];
}
