<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignarAulas extends Model
{
    protected $table='asignar_aula';
    protected $primaryKey='id_asignar_aula';
    protected $fillable=['id_horario','id_aula','dia','entrada','salida'];
}
