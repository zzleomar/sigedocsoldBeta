<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreparaduriaAsignaturasCursando extends Model
{
      protected $table='preparaduria_asignaturas_cursando';
    protected $primaryKey='id_preparaduria_asignaturas_cursando';
    protected $fillable=['id_preparaduria','id_asignatura'];
}
