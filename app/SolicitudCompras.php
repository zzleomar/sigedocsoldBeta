<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudCompras extends Model
{
     protected $table = 'solicitud_compra';
    protected $primaryKey='id_solicitud_compra';
    protected $fillable=['compra_id','material_id','cantidad'];

}
