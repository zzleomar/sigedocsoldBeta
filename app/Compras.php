<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $table = 'compra';
    protected $primaryKey='id_compra';
    protected $fillable=['dependencia_id','estatus_id','fecha','nrosol','nro_solicitud','anio','observacion','solicitado_por','conformado_por','autorizado_por'];

}
