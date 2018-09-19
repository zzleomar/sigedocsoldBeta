<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plazas extends Model
{
    protected $table='plazas';
    protected $primaryKey='id_plazas';
    protected $fillable=['id_concurso','id_asignatura'];
}
