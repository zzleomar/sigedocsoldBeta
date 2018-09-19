<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table='categoria_documento';
    protected $primaryKey='id_categoria';
    protected $fillable=['nombre_categoria','descripcion_categoria'];
}