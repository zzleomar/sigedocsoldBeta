<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaturas extends Model
{
    //
    protected $table='asignatura';
    protected $primaryKey='id_asignatura';
    protected $fillable=['codigo','nombre','semestre'];
}
