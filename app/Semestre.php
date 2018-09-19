<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $table='semestre';
    protected $primaryKey='id_semestre';
    protected $fillable=['nombre'];
}
