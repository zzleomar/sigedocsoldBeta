<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OficioContratacionPreparador extends Model
{
    protected $table = 'oficio_contratacion_preparador';
    protected $primaryKey='id_oficio_contratacion_preparador';
    protected $fillable=['id_oficio','id_concurso','id_periodo','descripcion','nro_consejo','fecha_contratacion','observacion','fecha_consejo'];

}
