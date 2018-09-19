<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table='horario';
    protected $primaryKey='id_horario';
    protected $fillable=['id_preparaduria','id_asignatura'];
}
