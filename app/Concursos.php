<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concursos extends Model
{
    protected $table='concurso';
    protected $primaryKey='id_concurso';
    protected $fillable=['id_periodo','fecha_apertura','fecha_cierre','cupo_asignado','limite'];
}
