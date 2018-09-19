<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{
    protected $table='aula';
    protected $primaryKey='id_aula';
    protected $fillable=['nombre'];
}
