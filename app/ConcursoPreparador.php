<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConcursoPreparador extends Model
{
    protected $table='concurso_preparador';
    protected $primaryKey='id_concurso_preparador';
    protected $fillable=['id_user','puntaje','condicion'];
}

