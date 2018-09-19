<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table='institucion';
    protected $primaryKey='id_institucion';
    protected $fillable=['nombre_institucion','siglas_institucion','descripcion_institucion','nucleo_institucion'];
    
    
}
