<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellosEscuelas extends Model
{
     protected $table='selloescuela';
    protected $primaryKey='id_sello_sello_escuela';
    protected $fillable=['id_dependencia','sello'];
}
