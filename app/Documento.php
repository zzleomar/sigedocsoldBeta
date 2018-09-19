<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
 protected $table = 'documento';
  protected $primaryKey='id_documento';
    protected $fillable=['id_dependencia_c','id_usuario','id_categoria','id_subcategoria','id_itemsubcategoria','id_estados','codigo_plantilla','descripcion_documento','descripcion_documento','html_documento'];

}