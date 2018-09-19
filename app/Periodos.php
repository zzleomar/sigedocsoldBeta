<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    protected $table='periodo';
    protected $primaryKey='id_periodo';
    protected $fillable=['nombre'];
}
